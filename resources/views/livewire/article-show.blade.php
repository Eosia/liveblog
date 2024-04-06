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

                                <div class="mb-2">
                                    Catégorie : <a href="{{ route('category', $article->category->slug) }}" wire:navigate>
                                        {{ $article->category->name }}
                                    </a>
                                </div>

                                {{--<div class="text-center">
                                    <img src="{{ $article->photo->url }}" alt="{{ $article->title }}"
                                        decoding="async" loading="lazy" class="img-fluid"
                                    >
                                </div>--}}

                                <div id="carouselExample" class="carousel carousel-dark slide">
                                    <div class="carousel-inner">
                                        @foreach($article->photos as $photo)
                                        <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}"
                                        >
                                            <img src="{{ $photo->url }}" class="d-block img-fluid mx-auto"
                                                 alt="{{ $article->title }} photo {{ $loop->iteration }}"
                                                width="500" height="500"
                                            >
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                                <div class="mt-4 markdown">
                                    <div>
                                        {{ $article->content }}
                                    </div>
                                    <div class="mt-4">
                                        <img
                                            decoding="async" loading="lazy"
                                            src="{{ $article->user->avatar->thumbnail_url ?? asset('default_images/default.png') }}"
                                            alt="{{ $article->user->name }}"
                                            class="avatar">
                                        <span>
                                    <a wire:navigate href="{{ route('user', $article->user->slug) }}">{{ $article->user->name }}</a>
                                    - Publié le {{ $article->created_at->isoFormat('LLL') }}
                                </span>
                                        <br><br>
                                        @if(Auth::check() && Auth::id() == $article->user_id)
                                            <span>
                                        <a href="{{ route('article.edit', $article->slug) }}"
                                           class="btn btn-primary">Modifier</a>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ $article->comments_count }} Commentaire(s)
                                </h3>

                                @auth()

                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form wire:submit.prevent="storeComment">
                                        <div class="mb-3">
                                            <textarea wire:model="content" class="form-control" rows="3"
                                                placeholder="Entrez votre commentaire ..."
                                            ></textarea>
                                        </div>
                                        @error('content')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="mb-3 text-end">
                                            <button type="submit" class="btn btn-primary">
                                                Envoyer
                                            </button>
                                        </div>
                                    </form>
                                @endauth

                                @guest()
                                    <div class="alert alert-warning">
                                        Vous devez <a href="{{ route('login') }}">
                                            vous connecter
                                        </a> pour commenter
                                    </div>
                                @endguest

                                <div x-data="{comments: @js($article->comments), expanded:false}"
                                    class="list-group list-group-flush list-group-hoverable"
                                >
                                    <template x-for="(comment, index) in comments" :key="index">
                                        <div class="row align-items-center mb-4"
                                            x-show="index <=2 || expanded" x-transition.opacity.delay.30ms
                                        >
                                            <div class="col-auto">
                                                <a :href="'/user/'+comment.user.slug" wire:navigate>
                                                    <img :src="comment?.user?.avatar?.thumbnail_url ?? '/php_fans/jpeg'"
                                                         :alt="comment.user.name"
                                                        decoding="async" loading="lazy" class="avatar"
                                                    >
                                                </a>
                                            </div>
                                            <div class="col text-truncate">
                                                <a :href="'/user/'+comment.user.slug" wire:navigate>
                                                    <span x-text="comment.user.name"></span>
                                                </a>
                                                -
                                                <span class="text-muted" x-text="comment.time_ago"></span>

                                                <div x-text="comment.content" class="d-block text-muted mt-n1">

                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <button x-show="comments.length > 3" @click="expanded = ! expanded"
                                            x-text="expanded ? 'Moins de commentaires' : 'Voir plus de commentaires'"
                                            class="btn btn-info mt-1 text-center"
                                    >

                                    </button>

                                    <div x-show="! comments.length" class="alert alert-info">
                                        Aucun commentaire actuellement
                                    </div>

                                </div>

{{--                                @if($article->comments_count)--}}
{{--                                    <div class="list-group list-group-flush list-group-hoverable">--}}

{{--                                        @foreach($article->comments as $comment)--}}
{{--                                            <div wire:key="{{ $comment->id }}"--}}
{{--                                                 class="list-group-item">--}}
{{--                                                <div class="row align-items-center">--}}
{{--                                                    <div class="col-auto">--}}
{{--                                                        <a href="{{ route('user', $comment->user->slug) }}">--}}
{{--                                                            <img class="avatar"--}}
{{--                                                                 src="{{ $comment->user->avatar->thumbnail_url ?? asset('default_images/default.png') }}"--}}
{{--                                                                 alt="{{ $comment->user->name }}">--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col text-truncate">--}}
{{--                                                        <a href="{{ route('user', $comment->user->slug) }}">--}}
{{--                                                            <span>{{ $comment->user->name }}</span>--}}
{{--                                                        </a>--}}
{{--                                                        ---}}
{{--                                                        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>--}}
{{--                                                        <div class="d-block text-muted text-truncate mt-n1">--}}
{{--                                                            {{ $comment->content }}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                        </div>--}}
{{--                                @else--}}
{{--                                    <div class="alert alert-info">--}}
{{--                                        Aucun commentaire pour le moment--}}
{{--                                    </div>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

                            </div>
                        </div>


                    </div>


                </div>

            </div>
        </div>
        @livewire('partials.footer')
    </div>
</div>
