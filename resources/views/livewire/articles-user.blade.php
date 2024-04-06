<div>
    @livewire('partials.header')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-md-3 border-end">
                        @livewire('partials.sidebar', ['heading' => $heading])
                    </div>
                    <div class="col-12 col-md-9 d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">{{ $heading }}</h2>

                            <h3 class="card-title mt-4">{{ $heading }}</h3>

                            @if($success)
                                <div class="alert alert-success">
                                    {{ $success }}
                                </div>
                            @endif

                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Ajouté le</th>
                                <th>Mise à jour</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @forelse ( $articles as $article )
                                    <tr>
                                        <td>
                                            <a wire:navigate href="{{ route('article.show', $article->slug) }}">{{ $article->id }}</a>
                                        </td>
                                        <td>
                                            <a wire:navigate href="{{ route('article.show', $article->slug ) }}">{{ $article->title }}</a>
                                        </td>
                                        <td>
                                            <a wire:navigate href="{{ route('category', $article->category->slug) }}">
                                                {{ $article->category->name }}
                                            </a>
                                        </td>
                                        <td>{{ $article->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $article->updated_at->format('d/m/Y') }}</td>
                                        <td><span class="{{ $article->status != 'published' ? 'text-warning' : 'text-primary' }}">{{ $article->status }}</span></td>
                                        <td>
                                            <a href="{{ route('article.edit', $article->slug) }}" class="btn btn-primary btn-sm">Editer</a>
                                            <button
                                                wire:confirm="Etes-vous sûr de vouloir supprimer cet article?"
                                                wire:click="delete({{ $article->id }})"
                                                class="btn btn-danger btn-sm">
                                                X
                                            </button>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>

                            {{ $articles->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

