<div class="card-body">
    <h4 class="subheader">{{ $heading }}</h4>
    <div class="list-group list-group-transparent">
        <a href="{{ route('profile') }}" class="list-group-item list-group-item-action d-flex align-items-center
            {{ request()->is('profile') ? 'active' : '' }}"
            wire:navigate.hover>
            Mon compte
        </a>
        <a href="{{ route('password') }}" class="list-group-item list-group-item-action d-flex align-items-center
            {{ request()->is('password') ? 'active' : '' }}"
            wire:navigate.hover>
            Mot de passe
        </a>
        <a href="{{ route('delete') }}" class="list-group-item list-group-item-action d-flex align-items-center
            {{ request()->is('delete') ? 'active' : '' }}"
           wire:navigate.hover>
            Supprimer mon compte
        </a>

        <a href="{{ route('article.create') }}" class="list-group-item list-group-item-action d-flex align-items-center
            {{ request()->is('article/create') ? 'active' : '' }}"
           wire:navigate.hover>
            Ajouter un article
        </a>

    </div>
    <h4 class="subheader mt-4">Experience</h4>
    <div class="list-group list-group-transparent">
        <a href="#" class="list-group-item list-group-item-action">Give Feedback</a>
    </div>
</div>
