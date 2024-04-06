<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Sidebar extends Component
{

    public string $heading;

    public function mount($heading) {
        $this->heading = $heading;
    }

    public function render()
    {
        return view('livewire.partials.sidebar');
    }
}
