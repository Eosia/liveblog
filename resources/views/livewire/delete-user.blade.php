<div>
    @livewire('partials.header')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <div class="col-3 d-none d-md-block border-end">
                        @livewire('partials.sidebar', ['heading' => $heading])
                    </div>
                    <div class="col d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">{{ $heading }}</h2>

                            <form wire:submit="delete">
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Entrer "supprimer" pour supprimer votre compte</div>
                                        <input wire:model="deleteText"
                                               type="text" placeholder="supprimer"
                                               class="form-control" autofocus>
                                        @error('deleteText')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="btn-list justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            Supprimer mon compte
                                        </button>
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

