<?php

namespace App\Livewire;

use App\Http\Services\ArticleService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;


class Home extends Component
{
    use WithPagination;

    public string $sort = '';
    public string $direction = '';
    public string $search = '';

    protected function queryString() : array {
        return [
            'sort' => ['except' => ''],
            'direction' => ['except' => ''],
            'search' => ['except' => ''],
        ];
    }


    private ArticleService $articleService;

    public function boot(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    public function getArticles() {
        if(! in_array($this->direction, ['asc', 'desc'])) {
           $this->direction = 'desc';
        }
        return $this->articleService
            ->getAll(Article::query()->published(), $this->sort, $this->direction, $this->search)
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
        return view('livewire.home',
        [
           'heading' => 'Accueil',
//            'articles' => $this->articleService->getAll(Article::query(), null, null)
//                ->paginate(9),
            'articles' => $this->getArticles(),
        ])
            ->title('Blog - '.config('app.name'))
            ->layoutData([
              'description' => 'Retrouvez ici tous les articles du blog.'
            ]);
    }
}
