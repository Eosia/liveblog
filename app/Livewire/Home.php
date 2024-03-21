<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Article;


class Home extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home',
        [
           'heading' => 'Accueil',
            'articles' => Article::query()->published()
            ->with(['user.avatar', 'photo', 'category'])
                ->latest()->paginate(9),
        ])
            ->title('Blog - '.config('app.name'))
            ->layoutData([
              'description' => 'Retrouvez ici tous les articles du blog.'
            ]);
    }
}
