<div>
    <a wire:click.prevent="toggleLike" href="" class="ms-3 text-muted">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="{{ $liked ? 'text-danger icon icon-tabler icon-tabler-heart-filled' : 'icon' }}"
             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             fill="{{ $liked ? 'red' : 'none' }}" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
    </a>
    {{-- Avec $wire, on met à jour de manière réactive en syncronisant avec le serveur depuis Alpine --}}
    <span x-text="$wire.likesCount"></span>
</div>
