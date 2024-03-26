<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Article;

class ArticleShow extends Component
{

    public Article $article;
    #[Validate('required|min:3')]
    public string $content = '';

    public function mount(Article $article) {

        abort_unless($article->status === Article::STATUS_PUBLISHED ||
            auth()->id() == $article->user_id, 403);

         $this->article = $article->load([
             'photos',
             'user.avatar',
             'category',
             'comments' => fn($query) =>$query->with('user.avatar')->latest(),
         ])
         ->loadCount('comments');
    }

    public function storeComment() {
        $this->validate();
        $comment = $this->article->comments()->create([
            'content' => $this->content,
            'user_id'=> auth()->id(),
        ]);
        session()->flash('success', 'Votre commentaire a été ajouté');
        $this->redirectRoute('article.show', ['article' => $this->article->slug], true,true);
    }

    public function render()
    {
        return view('livewire.article-show', [
            'heading' => $this->article->title,
        ]);
    }
}
