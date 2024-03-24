<?php

namespace App\Livewire;

use Livewire\Component;

class Criteria extends Component
{
    public $sort, $direction, $search;

    public function mount($sort, $direction, $search)
    {
        $this->sort = $sort;
        $this->direction = $direction;
        $this->search = $search;
    }

    public function sortBy($sort) : void
    {
        $this->dispatch('updateSort', $this->sort, $this->direction, $this->search);
    }

    public function render()
    {
        return view('livewire.criteria');
    }
}
