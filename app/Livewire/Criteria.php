<?php

namespace App\Livewire;

use Livewire\Component;

class Criteria extends Component
{

    public $sort, $direction;

    public function mount($sort, $direction) {
        $this->sort = $sort;
        $this->direction = $direction;
    }

    public function sortBy($sort) : void {
        $this->dispatch('updateSort', $this->sort, $this->direction);
    }

    public function render()
    {
        return view('livewire.criteria');
    }
}
