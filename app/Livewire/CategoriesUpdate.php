<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoriesUpdate extends Component
{
    use WithPagination;
    public string $success = '';

    #[Validate('required|min:3|max:50')]
    public string $name = '';

    public function store()
    {
        $this->validate();
        $category = Category::create([
            'name' => $this->name,
        ]);
        cache()->forget('header-categories');
        session()->flash('success', 'Catégorie ajoutée avec succès.');
        $this->redirectRoute('categories.update');
    }

    public function delete(int $category_id) : void
    {
        $category = Category::findOrFail($category_id)->load('articles');
        DB::transaction(function() use($category){
            $category->articles->each(function($article){
                Storage::disk('public')->deleteDirectory('articles/'.$article->id);
                $article->delete();
            });
            $category->delete();
        });
        cache()->forget('header-categories');
        session()->flash('success', 'Catégorie supprimée avec succès.');
        $this->redirectRoute('categories.update');
    }

    public function render()
    {
        return view('livewire.categories-update', [
            'heading' => 'Gérer les catégories',
            'categories' => Category::withCount([
                'articles' => fn($query) => $query->where('status', Article::STATUS_PUBLISHED),
                'comments',
                'likes',
            ])->latest('id')->paginate(10),
        ]);
    }
}
