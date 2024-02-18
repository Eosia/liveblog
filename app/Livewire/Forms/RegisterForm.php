<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    //
    #[Validate('required|min:3|max:20|unique:users,name')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|min:6|max:191|confirmed')]
    public string $password = '';
    public string $password_confirmation = '';

}
