<?php

namespace App\Livewire;

use App\Http\Services\ArticleService;
use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Category as CategoryModel;
use Livewire\WithPagination;

class Category extends Component
{

    use withPagination;
    public CategoryModel $category;
    private ArticleService $articleService;
    public $sort, $direction, $search;

    protected function queryString() : array {
        return [
            'sort' => ['except' => ''],
            'direction' => ['except' => ''],
            'search' => ['except' => ''],
        ];
    }


    public function mount(CategoryModel $category) : void {
        $this->category = $category;
    }

    public function boot(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    public function getArticles() {
        if(! in_array($this->direction, ['asc', 'desc'])) {
            $this->direction = 'desc';
        }
        return $this->articleService
            ->getAll(Article::query()->whereCategoryId($this->category->id)->published(), $this->sort, $this->direction, $this->search)
            ->paginate(9);
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
            'articles' => $this->getArticles(),
        ]);
    }
}
