<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]

class Forgot extends Component
{

    #[Validate('required|email|exists:users,email')]
    public string $email = '';

    public function store() {
        $this->validate();
        $user = User::whereEmail($this->email)->first();
        $token = Str::uuid();

        DB::beginTransaction();

        try {
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();

            DB::table('password_reset_tokens')->insertOrIgnore([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
            ]);
        }
        catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        $user->notify(new PasswordResetNotification($token, $user->email));

        session()->flash('success', 'Un email vous a été envoyé');
        $this->reset('email');
        $this->redirect(route('forgot')); // Assurez-vous que la route est correctement nommée ('forgot' semble incorrect si vous redirigez vers la page de connexion)
    }

    public function render()
    {
        return view('livewire.auth.forgot');
    }
}
