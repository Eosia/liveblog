<?php

namespace App\Livewire;

use Livewire\Component;

class Card extends Component
{

    public $article;

    public function mount($article) {
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.card');
    }
}
