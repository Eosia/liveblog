<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]

class Reset extends Component
{

    public string $token = '';
    public string $email = '';
    #[Validate('required|min:6|max:191|confirmed')]
    public string $password = '';
    public string $password_confirmation = '';
    public string $error = '';
    public string $user;

    public function mount()
    {
        $this->token = request()->query('token', null);
        $password_reset_token = DB::table('password_reset_tokens')
            ->where('token', $this->token)
            ->where('created_at', '>', now()->subHour())
            ->first();
        if(! $password_reset_token){
            session()->flash('error', 'Le lien de réinitialisation a expiré. <br>
            Veuillez de nouveau faire un demande de réinitialisation.');
            return redirect()->route('forgot');
        }

        $this->email = $password_reset_token->email;
        $this->user = User::where('email', $this->email)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.auth.reset');
    }
}
