<div class="page page-center">
    <div class="container container-tight py-4">
        <x-partials.logo />
        <form class="card card-md" wire:submit="store">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    Créer un nouveau compte
                </h2>
                <div class="mb-3">
                    <label class="form-label">Nom</label>
                    <input  wire:model.blur="form.name" type="text" class="form-control" placeholder="John Doe">
                </div>
                @error('form.name')
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label class="form-label" >Adresse email</label>
                    <input wire:model.blur="form.email" type="email" class="form-control" placeholder="monsuper@email.com">
                </div>
                @error('form.email')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <div class="input-group input-group-flat">
                        <input wire:model.blur="form.password" type="password" class="form-control"  placeholder="Super@S3cr3tPassword"  autocomplete="off">
                    </div>
                </div>
                @error('form.password')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Confirmer mot de passe</label>
                    <div class="input-group input-group-flat">
                        <input wire:model.blur="form.password_confirmation" type="password" class="form-control"  placeholder="Super@S3cr3tPassword"  autocomplete="off">
                    </div>
                </div>
                @error('form.password_confirmation')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Inscription
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            J'ai déjà un compte.
            <br>
            <br>
            <a href="{{ route('login') }}" tabindex="-1">
                Connexion
            </a>
        </div>
    </div>
</div>
