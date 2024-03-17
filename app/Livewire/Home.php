<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home',
        [
           'heading' => 'Accueil',
        ])
            ->title('Blog - '.config('app.name'))
            ->layoutData([
              'description' => 'Retrouvez ici tous les articles du blog.'
            ]);
    }
}
