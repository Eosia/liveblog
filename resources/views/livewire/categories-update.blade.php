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

                            @session('success')
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endsession

                            <form wire:submit="store">
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <div class="form-label">Ajouter une catégorie</div>
                                        <input type="text" class="form-control" wire:model="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="btn-list justify-content-end">
                                        <button class="btn btn-primary" type="submit">Ajouter</button>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-striped">
                                <thead>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Nombre d'articles</th>
                                <th>Nombre de likes</th>
                                <th>Nombre de commentaires</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @forelse ( $categories as $category )
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></td>
                                        <td>{{ $category->articles_count }}</td>
                                        <td>{{ $category->likes_count }}</td>
                                        <td>{{ $category->comments_count }}</td>
                                        <td>
                                            <button
                                                wire:confirm="Etes vous sûr de vouloir supprimer cette catégorie?"
                                                wire:click="delete({{ $category->id }})"
                                                class="btn btn-danger btn-sm">
                                                X
                                            </button>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>

                            {{ $categories->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

