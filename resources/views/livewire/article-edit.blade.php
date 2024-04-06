<div>
    @livewire('partials.header')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-md-3 border-end">
                        @livewire('partials.sidebar', ['heading' => $heading])
                    </div>
                    <div class="col-12 col-md-9 d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">{{ $heading }}</h2>

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($success)
                                <div class="alert alert-success">
                                    {{ $success }}
                                </div>
                            @endif

                            <form wire:submit="update" method="post" enctype="multipart/form-data">
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <div class="form-label">Titre</div>
                                        <input type="text" class="form-control" wire:model="title">
                                        @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <div class="form-label">Contenu</div>
                                        <textarea wire:model="content" class="form-control" rows="5"></textarea>
                                        @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <div class="form-label">Catégorie</div>
                                        <select wire:model="category" class="form-select">
                                            <option value="">Choisir une catégorie</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <div class="form-label">Status</div>
                                        <select wire:model="status" class="form-select">
                                            <option value="">Status</option>
                                            <option value="published">Publié</option>
                                            <option value="draft">Brouillon</option>
                                        </select>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-auto mt-2">
                                    <div class="form-label">Photos</div>
                                    <div
                                        x-data="{ uploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="uploading = true"
                                        x-on:livewire-upload-finish="uploading = false"
                                        x-on:livewire-upload-error="uploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    >
                                        <input type="file" class="form-control" wire:model="photos" multiple>

                                        <div x-show="uploading">
                                            <progress class="progressbar" max="100" x-bind:value="progress"></progress>
                                        </div>
                                    </div>

                                    @error('photos')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="row mt-2">
                                    <div class="col-md">
                                        @if($this->photos)
                                            @foreach($this->photos as $photo)
                                                <img src="{{ $photo->temporaryUrl() }}" class="avatar avatar-xl m-2">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md">
                                        @if($this->article->photos)
                                            @foreach($this->article->photos as $photo)
                                                <img src="{{ $photo->thumbnail_url }}" class="avatar avatar-xl m-2">
                                                <a class="text-danger d-inline-block cursor-pointer"
                                                   wire:confirm="Supprimer cette photo?"
                                                   wire:click="deletePhoto({{ $photo->id }})">
                                                    x
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <div class="btn-list justify-content-end">
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
