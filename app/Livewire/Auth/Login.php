<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Livewire\Attributes\Layout;
use Livewire\Component;

    #[Layout('components.layouts.auth')]
class Login extends Component
{

    public LoginForm $form;

    public string $error = '';

    public function mount()
    {
        Redirect::setIntendedUrl(url()->previous());
    }

    public function store()
    {
        $this->validate();
        if(auth()->attempt($this->form->all(), true)) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }
        $this->error = 'Identifiants incorrects';
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
