<?php

namespace App\Livewire\Partials;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public $username = '';

    public function mount() {
        $this->username = auth()->user()?->name;
    }

    #[On('update-user')]
    public function updateUser($username) {
        $this->username = $username;
    }

    #[Computed(cache:true, key: 'header-categories')]

    public function categories() {
        return Category::query()
            ->whereHas('articles', fn($query) => $query->published())
            ->orderBy('name')->get();

    }

}
