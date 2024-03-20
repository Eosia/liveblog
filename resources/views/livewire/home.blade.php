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

                    @forelse($articles as $article)
                        <div class="col-sm-6 col-lg-4">
                            <div class="card card-sm">
                                <a href="#" class="d-block">
                                    <img src="{{ $article->photo->thumbnail_url }}"
                                         class="card-img-top" alt="{{ $article->title }}"
                                        width="417" height="281"
                                         loading="lazy" decoding="async"
                                    >
                                </a>
                                <div class="card-body">
                                    <h3 class="text-truncate">
                                        <a href="#">
                                            {{ $article->title }}
                                        </a>
                                    </h3>
                                    <div class="d-flex align-items-center">
                                        <span class="rounded avatar me-3">
                                            <img src="{{ $article->user->avatar->thumbnail_url ?? asset('default_images/default.png') }}"
                                                 class="card-img-top" alt="{{ $article->user->name }}"
                                                 width="40" height="40"
                                                 loading="lazy" decoding="async"
                                            >
                                        </span>
                                        <div>
                                            <div>
                                                {{ $article->user->name }}
                                            </div>
                                            <div class="text-muted">
                                                {{ $article->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="#" class="ms-3 text-muted">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                                                67
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <h2>
                            Aucun article à afficher
                        </h2>
                    @endforelse
                </div>
                <div class="d-flex mt-4 justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        @livewire('partials.footer')
    </div>
</div>
