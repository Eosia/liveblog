<?php

namespace App\Livewire;

use App\Http\Services\ArticleService;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;


class Home extends Component
{
    use WithPagination;

    private ArticleService $articleService;

    public function boot(ArticleService $articleService) {
        $this->articleService = $articleService;
    }

    public function render()
    {
        return view('livewire.home',
        [
           'heading' => 'Accueil',
            'articles' => $this->articleService->getAll(Article::query(), null, null)
                ->paginate(9),
        ])
            ->title('Blog - '.config('app.name'))
            ->layoutData([
              'description' => 'Retrouvez ici tous les articles du blog.'
            ]);
    }
}
