<div>
    @if($success)

        <div class="alert alert-success">
            {{ $success }}
        </div>

    @endif

    <form enctype="multipart/form-data" wire:submit="store">
        <div class="col-auto">
            @if($avatar)
                <img src="{{ $avatar->temporaryUrl() }}" class="avatar avatar-xl">
            @else
                <img
                    src="{{ $this->user->avatar->thumbnail_url ?? asset('default_images/default.png') }}"
                    class="avatar avatar-xl">
            @endif
        </div>
        <div class="col-auto mt-2">


            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <input type="file" class="form-control" wire:model="avatar">

                <div x-show="uploading">
                    <progress class="progressbar" max="100" x-bind:value="progress"></progress>
                </div>
            </div>


            @error('avatar')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-auto mt-2">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </div>
    </form>
</div>
