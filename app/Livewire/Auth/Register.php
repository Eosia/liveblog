<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterForm;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]

class Register extends Component
{

    public RegisterForm $form;

    public function store() {
        $this->validate();
        $user = User::create($this->form->all());
        auth()->login($user);
        return $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->title('Inscription - '.config('app.name'))
            ->layoutData([
                'description' => 'Inscrivez-vous pour accéder à votre compte'
            ]);
    }
}
