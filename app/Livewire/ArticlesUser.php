<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Traits\ArticleTrait;
use App\Http\Services\ArticleService;
use Illuminate\Support\Facades\Storage;

class ArticlesUser extends Component
{
    use WithPagination;
    use ArticleTrait;

    public User $user;
    private ArticleService $articleService;
    public string $success;
    public $sort, $direction, $search;

    public function mount(User $user) : void
    {
        $this->user = auth()->user();
    }

    public function boot(ArticleService $articleService) : void
    {
        $this->articleService = $articleService;
    }

    public function delete(Article $article)
    {
        abort_if($this->user->id != $article->user_id, 403);
        Storage::disk('public')->deleteDirectory('articles/'.$article->id);
        $article->delete();
        cache()->forget('header-categories');
        $this->success = 'Article supprimé avec succès.';
    }

    public function render()
    {
        return view('livewire.articles-user', [
            'heading' => 'Mes articles',
            'articles' => $this->getArticles(Article::query()->whereUserId($this->user->id)),
        ]);
    }
}
