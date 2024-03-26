<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{

    public string $name, $email;
    public string $success = '';

    public function rules() {
        return [
            'name' => ['required', Rule::unique('users')->ignore(Auth::user())],
            'email' => ['required', 'email', rule::unique('users')->ignore(Auth::user())],
        ];
    }

    public function mount() {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function store() {
        $this->validate();
        Auth::user()->update($this->all());

        $this->dispatch('update-user', username: Auth::user()->name);
        $this->success = 'Vos informations ont été mises à jours.';

    }



    public function render()
    {
        return view('livewire.profile', [
            'user' => Auth::user(),
            'heading' => 'Mes informations',
        ]);
    }
}
