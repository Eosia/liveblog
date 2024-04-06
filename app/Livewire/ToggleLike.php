<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ToggleLike extends Component
{
    public Article $article;
    public int $likesCount = 0;
    public bool $liked = false;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->likesCount = $this->article->likes_count;
        $this->liked = $this->article->liked;
    }

    public function toggleLike()
    {
        if(! auth()->check()){
            return redirect()->route('login');
        }

        if($this->article->likes()->where('user_id', auth()->id())->exists()){
            $this->article->likes()->where('user_id', auth()->id())->delete();
            $this->liked = false;
        }
        else{
            $this->article->likes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->liked = true;
        }
        $this->likesCount = $this->article->likes()->count();
    }

    public function render()
    {
        return view('livewire.toggle-like');
    }
}
