<div class="page">
    <!-- Navbar -->
    @livewire('partials.header')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            {{ $heading }}
                        </h2>
                    </div>


                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ $heading }}
                                </h3>
                                <div class="mb-2">
                                    Catégorie : <a href="{{ route('category', $article->category->slug) }}">
                                        {{ $article->category->name }}
                                    </a>
                                </div>

                                <div class="text-center">
                                    <img src="{{ $article->photo->url }}" alt="{{ $article->title }}"
                                        decoding="async" loading="lazy" class="img-fluid"
                                    >
                                </div>

                                <div class="mt-4 markdown">
                                    <div>
                                        {{ $article->content }}
                                    </div>

                                    <div class="mt-4">
                                        <img src="{{ $article->user->avatar->thumbnail_url
                                            ?? asset('default_images/default.png') }}"
                                             alt="{{ $article->user->name }}" class="avatar"
                                             decoding="async" loading="lazy" }}
                                        >
                                        <span>
                                            <a href="{{ route('user', $article->user->slug) }}"
                                                wire:navifate.hover
                                            >
                                                {{ $article->user->name }}
                                            </a>
                                        </span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ $article->comments_count }} Commentaire(s)
                                </h3>

                                @if($article->comments_count)
                                    <div class="list-group list-group-flush list-group-hoverable">

                                        @foreach($article->comments as $comment)
                                            <div wire:key="{{ $comment->id }}"
                                                 class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <a href="{{ route('user', $comment->user->slug) }}">
                                                            <img class="avatar"
                                                                 src="{{ $comment->user->avatar->thumbnail_url ?? asset('default_images/default.png') }}"
                                                                 alt="{{ $comment->user->name }}">
                                                        </a>
                                                    </div>
                                                    <div class="col text-truncate">
                                                        <a href="{{ route('user', $comment->user->slug) }}">
                                                            <span>{{ $comment->user->name }}</span>
                                                        </a>
                                                        -
                                                        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                                                        <div class="d-block text-muted text-truncate mt-n1">
                                                            {{ $comment->content }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                @else
                                    <div class="alert alert-info">
                                        Aucun commentaire pour le moment
                                    </div>
                                    </div>
                                @endif

                            </div>
                        </div>


                    </div>


                </div>

            </div>
        </div>
        @livewire('partials.footer')
    </div>
</div>
