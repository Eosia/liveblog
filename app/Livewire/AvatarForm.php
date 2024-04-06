<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Avatar;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

class AvatarForm extends Component
{
    use WithFileUploads;

    public User $user;
    #[Validate(['avatar' => 'required|image|mimes:jpeg,png,gif,webp|dimensions:min_width:150,min_height:150'])]
    public $avatar;
    public $success;

    public function mount(User $user)
    {
        $this->user = $user->load('avatar');
    }

    public function store()
    {
        $this->validate();
        $path = Storage::disk('public')->putFile('avatars/'.$this->user->id, $this->avatar);
        $avatar = Avatar::updateOrCreate(['user_id' => $this->user->id], [
            'path' => $path,
            'url' => Storage::disk('public')->url($path),
            'size' => Storage::size($path),
        ]);

        // Lire le contenu du fichier temporaire et le passer à la méthode resize
        $fileContent = file_get_contents($this->avatar->getRealPath());
        if($avatar->resize($fileContent, 'avatars/'.$this->user->id.'/thumbnails', 150, 150, 90)){
            $this->dispatch('update-avatar', ['avatar' => $avatar->url]);
            $this->success = 'Avatar sauvegardé.';
        }
    }

    public function render()
    {
        return view('livewire.avatar-form');
    }
}
