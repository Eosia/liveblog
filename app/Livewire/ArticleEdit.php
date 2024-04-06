<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleEdit extends Component
{
    use WithFileUploads;
    public Article $article;
    public string $title;
    public string $content;
    public int $category;
    public string $status;
    public $categories;
    public $photos = [];

    public string $success = '';

    public function mount(Article $article)
    {
        $this->article = $article->load('photos');
        $this->title = $article->title;
        $this->content = $article->content;
        $this->category = $article->category_id;
        $this->status = $article->status;
        $this->categories = Category::all();
    }

    public function deletePhoto($photoId)
    {
        $photo = $this->article->photos()->findOrFail($photoId);
        Storage::disk('public')->delete($photo->path);
        $photo->delete();
        $this->success = 'La photo a été supprimée.';
        $this->article->refresh();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:10|max:500',
            'category' => 'required|exists:categories,id',
            'status' => 'required|in:'.Article::STATUS_DRAFT.','.Article::STATUS_PUBLISHED,
            'photos.*' => [
                'image',
                'mimes:jpeg,png',
            ]
        ]);

        try{
            DB::beginTransaction();
            $this->article->update([
                'title' => $this->title,
                'content' => $this->content,
                'category_id' => $this->category,
                'status' => $this->status,
            ]);
            if($this->photos){
                foreach($this->photos as $photo){
                    $path = Storage::disk('public')->putFile('articles/'.$this->article->id, $photo);
                    $newPhoto = $this->article->photos()->create([
                        'path' => $path,
                        'url' => Storage::disk('public')->url($path),
                        'size' => Storage::size($path),
                    ]);

                    // Lire le contenu du fichier temporaire et le passer à la méthode resize
                    $fileContent = file_get_contents($photo->getRealPath());
                    $newPhoto->resize($fileContent, 'articles/'.$this->article->id.'/thumbnails', 150, 150, 90);
                }
            }
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
        cache()->forget('header-categories');
        session()->flash('success', 'Votre article a été modifié.');
        $this->redirectRoute('article.edit', ['article' => $this->article->slug]);
    }

    public function render()
    {
        return view('livewire.article-edit', [
            'heading' => 'Editer '.$this->article->title,
        ]);
    }
}
