<?php

namespace App\Livewire;

use App\Http\Services\ArticleService;
use App\Http\Traits\ArticleTrait;
use App\Http\Traits\WithSorting;
use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Category as CategoryModel;
use Livewire\WithPagination;

class Category extends Component
{

    use withPagination;
    use WithSorting;
    public CategoryModel $category;
    use ArticleTrait;
    private ArticleService $articleService;
    public $sort, $direction, $search;

    public function mount(CategoryModel $category) : void {
        $this->category = $category;
    }

    public function boot(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    #[on('updateSort')]
    public function updateSort($sort, $direction, $search) {
        $this->sort = $sort;
        $this->direction = $direction;
        $this->search = $search;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.home', [
            'heading' =>'Articles de la catégorie : ' . $this->category->name,
            'articles' => $this->getArticles(
                Article::query()->published()->whereCategoryId($this->category->id)
            ),
        ]);
    }
}
