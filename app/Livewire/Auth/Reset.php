<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Incluez Hash
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.auth')]
class Reset extends Component
{
    public string $token = '';
    public string $email = '';
    #[Validate('required|min:8|max:20|confirmed')]
    public string $password = '';
    public string $password_confirmation = '';
    public string $error = '';
    public $user;

    public function mount()
    {
        $this->token = request()->query('token', null);
        $password_reset_token = DB::table('password_reset_tokens')
            ->where('token', $this->token)
            ->where('created_at', '>', now()->subHour())
            ->first();
        if (!$password_reset_token) {
            session()->flash('error', 'Le lien de réinitialisation a expiré. <br>
            Veuillez de nouveau faire une demande de réinitialisation.');
            return redirect()->route('forgot');
        }

        $this->email = $password_reset_token->email;
        $this->user = User::where('email', $this->email)->firstOrFail();
    }

    public function store()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!DB::table('password_reset_tokens')->where('token', $this->token)->where('email', $this->email)->exists()) {
            session()->flash('error', 'Le lien de réinitialisation a expiré. <br>
            Veuillez de nouveau faire une demande de réinitialisation.');
            return redirect()->route('forgot');
        }

        $this->user->update([
            'password' => Hash::make($this->password), // Utilisez Hash::make pour hacher le mot de passe
        ]);

        DB::table('password_reset_tokens')
            ->where('token', $this->token)->where('email', $this->email)
            ->delete();

        session()->flash('success', 'Votre mot de passe est réinitialisé ! <br>
        Vous pouvez maintenant vous connecter.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.reset');
    }
}
