<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    //
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|min:6|max:191')]
    public string $password = '';

}
