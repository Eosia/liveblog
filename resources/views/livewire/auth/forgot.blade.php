<div class="page page-center">
    <div class="container container-tight py-4">
        <div class="text-center mb-4">
            <a href="{{ url('/') }}" class="navbar-brand navbar-brand-autodark">
                <img src="{{ Vite::asset('resources/static/logo.svg') }}" height="36" alt="">
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div>
        @endif

        <form class="card card-md" wire:submit="store">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    Réinitialiser mon mot de passe
                </h2>

                <div class="mb-3">
                    <label class="form-label" >Adresse email</label>
                    <input wire:model.blur="email" type="email" class="form-control" placeholder="monsuper@email.com">
                </div>
                @error('email')
                <div class="text-danger mb-2">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            Je ne veux pas réinitialiser mon mot de passe.
            <br>
            <a href="{{ route('register') }}" tabindex="-1">
                M'inscrire
            </a>
            <br>
            <br>
            <a href="{{ route('login') }}" tabindex="-1">
                Me connecter
            </a>
        </div>
    </div>
</div>
