<?php

namespace App\Livewire;

use App\Models\User;
use App\Livewire\Home;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteUser extends Component
{
    public User $user;
    #[Validate('required|in:supprimer', as: 'supprimer')]
    public string $deleteText;

    public function mount() : void
    {
        $this->user = auth()->user()->load('articles.photos');
    }

    public function delete() : void
    {
        $this->validate();

        try{
            DB::beginTransaction();
            Storage::disk('public')->deleteDirectory('avatars/'.$this->user->id);
            $this->user->articles->each(function($article){
                $article->photos->each(function($photo){
                    Storage::disk('public')->delete($photo->path);
                });
            });
            $this->user->delete();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessages());
        }

        session()->flash('success', 'Votre compte a été supprimé.');
        $this->redirect(Home::class);
    }

    public function render()
    {
        return view('livewire.delete-user', [
            'heading' => 'Supprimer mon compte',
        ]);
    }
}
