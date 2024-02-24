<div class="page page-center">
    <div class="container container-tight py-4">
        <x-partials.logo />
        <form wire:submit="store" class="card card-md">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Réinitialiser le mot de passe</h2>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input wire:model.blur="email" type="email" class="form-control" placeholder="Email">
                </div>
                @error('.email')
                <div class="text-danger mb-2">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <div class="input-group input-group-flat">
                        <input wire:model.blur="password" type="password" class="form-control"  placeholder="Mot de passe"  autocomplete="off">
                    </div>
                </div>
                @error('password')
                <div class="text-danger mb-2">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Confirmer le mot de passe</label>
                    <div class="input-group input-group-flat">
                        <input wire:model.blur="password_confirmation" type="password" class="form-control"  placeholder="Confirmer"  autocomplete="off">
                    </div>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">Changer le mot de passe</button>
                </div>
            </div>
        </form>
        <div class="text-center text-muted mt-3">
            <a href="{{ route('login') }}" tabindex="-1">Me connecter</a>
        </div>
    </div>
</div>
