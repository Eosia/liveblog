<?php

namespace App\Livewire;

use App\Http\Services\ArticleService;
use App\Http\Traits\ArticleTrait;
use App\Http\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;


class Home extends Component
{
    use WithPagination;
    use WithSorting;
    use ArticleTrait;

    public string $sort = '';
    public string $direction = '';
    public string $search = '';



    private ArticleService $articleService;

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
        return view('livewire.home',
        [
           'heading' => 'Accueil',
//            'articles' => $this->articleService->getAll(Article::query(), null, null)
//                ->paginate(9),
            // 'articles' => $this->getArticles(),

                'articles'=> $this->getArticles(Article::query()->published()),
        ])
            ->title('Blog - '.config('app.name'))
            ->layoutData([
              'description' => 'Retrouvez ici tous les articles du blog.'
            ]);
    }
}
