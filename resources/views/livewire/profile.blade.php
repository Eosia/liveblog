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
                            <h3 class="card-title">Mon profil</h3>
                            <div class="row align-items-center">
                                @livewire('avatar-form', ['user' => $user])
                            </div>
                            <h3 class="card-title mt-4">{{ $heading }}</h3>

                            @if($success)
                                <div class="alert alert-success">
                                    {{ $success }}
                                </div>
                            @endif

                            <form wire:submit="store">
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Nom</div>
                                        <input type="text" wire:model="name"
                                               class="form-control" autofocus>
                                        @error('name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md">
                                        <div class="form-label">Email</div>
                                        <input type="email" class="form-control" wire:model="email">
                                        @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <div class="btn-list justify-content-end">
                                        <button type="submit" class="btn btn-primary">
                                            Envoyer
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
    @livewire('partials.footer')
</div>
