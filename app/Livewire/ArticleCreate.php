<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleCreate extends Component
{
    use WithFileUploads;

    public string $success = '';
    #[Validate('required|min:3|max:50')]
    public string $title = '';
    #[Validate('required|min:10|max:500')]
    public string $content = '';
    #[Validate('required|exists:categories,id')]
    public string $category = '';
    #[Validate('required|in:'.Article::STATUS_DRAFT.','.Article::STATUS_PUBLISHED)]
    public string $status = Article::STATUS_PUBLISHED;

    #[Validate([
        'photos' => 'required',
        'photos.*' => [
            'image',
            'mimes:jpeg,jpg,png,webp',
        ]
    ])]
    public $photos = [];

    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $this->validate();
        try{
            DB::beginTransaction();

            $article = auth()->user()->articles()->create([
                'title' => $this->title,
                'content' => $this->content,
                'category_id' => $this->category,
                'status' => $this->status,
            ]);

            foreach($this->photos as $photo)
            {
                $path = Storage::disk('public')->putFile('articles/'.$article->id, $photo);
                $newPhoto = $article->photos()->create([
                    'path' => $path,
                    'url' => Storage::disk('public')->url($path),
                    'size' => Storage::size($path),
                ]);

                // Lire le contenu du fichier temporaire et le passer à la méthode resize
                $fileContent = file_get_contents($photo->getRealPath());
                $newPhoto->resize($fileContent, 'articles/'.$article->id.'/thumbnails', 500, 450, 75);
            }

            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
        cache()->forget('header-categories');
        session()->flash('success', 'Votre article a été ajouté.');
        $this->redirectRoute('article.show', ['article' => $article->slug]);
    }

    public function render()
    {
        return view('livewire.article-create', [
            'heading' => 'Ajouter un article',
        ]);
    }
}
