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
                            <h3 class="card-title mt-4">Mot de passe</h3>

                            @if($success)
                                <div class="alert alert-success">
                                    {{ $success }}
                                </div>
                            @endif
                            <form wire:submit="update">
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Nouveau mot de passe</div>
                                        <input wire:model="password"
                                               type="password"
                                               class="form-control" autofocus>
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Confirmer le mot de passe</div>
                                        <input wire:model="password_confirmation"
                                               type="password"
                                               class="form-control">
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <div class="btn-list justify-content-end">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
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
</div>
