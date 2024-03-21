<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Header extends Component
{

    #[Computed(cache:true, key: 'header-categories')]

    public function categories() {
        return Category::query()
            ->whereHas('articles', fn($query) => $query->published())
            ->orderBy('name')->get();

    }

}
