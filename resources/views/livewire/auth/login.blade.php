<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ Vite::asset('resources/static/logo.svg') }}" height="36" alt="">
            </a>
        </div>

        @if($error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        <form class="card card-md" wire:submit="store">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    Connexion
                </h2>

                <div class="mb-3">
                    <label class="form-label" >Email address</label>
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

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Me connecter
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Je n'ai pas de compte.
            <br>
            <br>
            <a href="{{ route('register') }}" tabindex="-1">
                M'inscrire
            </a>
        </div>
    </div>
</div>
