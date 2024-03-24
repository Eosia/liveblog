<?php

namespace App\Livewire;

use App\Http\Services\ArticleService;
use App\Http\Traits\ArticleTrait;
use App\Http\Traits\WithSorting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as UserModel;
use App\Models\Article;

class User extends Component
{
    use WithPagination;
    use WithSorting;
    use ArticleTrait;

    public $sort, $direction, $search;
    public UserModel $user;
    private ArticleService $articleService;

    public function mount(UserModel $user) {
        $this->user = $user;
    }

    public function boot(ArticleService $articleService)
    {
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
            'heading' => 'Tous les articles de ' . $this->user->name,
            'articles' => $this->getArticles(Article::query()->whereUserId($this->user->id)->published()),
        ]);
    }
}
