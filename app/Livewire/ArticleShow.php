<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Article;

class ArticleShow extends Component
{

    public Article $article;

    public function mount(Article $article) {
         $this->article = $article->load([
             'photos',
             'user.avatar',
             'category',
             'comments.user.avatar',
         ])
         ->loadCount('comments');
    }

    public function render()
    {
        return view('livewire.article-show', [
            'heading' => $this->article->title,
        ]);
    }
}
