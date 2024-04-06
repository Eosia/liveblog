<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class Header extends Component
{
    public $username = '';
    public $avatar;

    public function mount()
    {
        $this->username = auth()->user()?->name;
        $this->avatar = auth()->user()?->avatar?->thumbnail_url ?? asset('default_images/default.png');
    }

    #[On('update-user')]
    public function updateUser($username)
    {
        $this->username = $username;
    }

    #[On('update-avatar')]
    public function updateAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    #[Computed(cache: true, key: 'header-categories')]
    public function categories()
    {
        return Category::query()
            ->whereHas('articles', fn($query) => $query->published())
            ->orderBy('name')->get();
    }
}
