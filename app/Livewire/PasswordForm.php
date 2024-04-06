<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class PasswordForm extends Component
{
    public string $success;
    public string $error = '';
    #[Validate('required|min:8|max:20|confirmed')]
    public string $password = '';
    public string $password_confirmation = '';

    public function update()
    {
        $this->validate();
        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);
        $this->reset();
        $this->success = 'Votre mot de passe a été mis à jour.';
    }

    public function render()
    {
        return view('livewire.password-form', [
            'heading' => 'Changer mot de passe',
            'user' => auth()->user(),
        ]);
    }
}
