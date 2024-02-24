<div class="page page-center">
    <div class="container container-tight py-4">
        <x-partials.logo />

        @if($error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif


        <form class="card card-md" wire:submit="store">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    Connexion
                </h2>

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

                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">
                        Me connecter
                    </button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">

            <a href="{{ route('register') }}" tabindex="-1">
                M'inscrire
            </a>
            <br><br>

            <a href="{{ route('forgot') }}" tabindex="-1">
                Réinitialiser mon mot de passe
            </a>

        </div>
    </div>
</div>
