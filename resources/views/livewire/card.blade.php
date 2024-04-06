<div class="col-sm-6 col-lg-4">
    <div class="card card-sm">
        <a wire:navigate href="{{ route('article.show', $article->slug) }}" class="d-block">
            <img src="{{ $article->photo->thumbnail_url }}"
                 class="card-img-top" alt="{{ $article->title }}"
                 width="417" height="281"
                 loading="lazy" decoding="async"
            >
        </a>
        <div class="card-body">
            <h3 class="text-truncate">
                <a href="{{ route('article.show', $article->slug) }}" wire:navigate>
                    {{ $article->title }}
                </a>
            </h3>
            <div class="d-flex align-items-center">
                 <span class="rounded avatar me-3">
                     <a href="{{ route('user', $article->user->slug) }}" wire:navigate>
                         <img src="{{ $article->user->avatar->thumbnail_url ?? asset('default_images/default.png') }}"
                              class="card-img-top" alt="{{ $article->user->name }}"
                              width="40" height="40"
                              loading="lazy" decoding="async" >
                     </a>
                     </span>
                <div>
                    <div>
                        <a href="{{ route('user', $article->user->slug) }}" wire:navigate>
                            {{ $article->user->name }}
                        </a>
                    </div>
                    <div class="text-muted">
                        {{ $article->created_at->diffForHumans() }}
                    </div>

                    Catégorie :
                    <span>
                        <a href="{{ route('category', $article->category->slug) }}" wire:navigate>
                               {{ $article->category->name }}
                           </a>
                    </span>

                </div>
                <div class="ms-auto">
                    <div class="ms-auto">

                         @livewire('toggle-like', ['article' => $article])
{{--                        <a href="#" class="ms-3 text-muted">--}}

{{--                            @if(! $article->liked)--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>--}}
{{--                            @else--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" class="text-danger icon icon-tabler icon-tabler-heart-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6.979 3.074a6 6 0 0 1 4.988 1.425l.037 .033l.034 -.03a6 6 0 0 1 4.733 -1.44l.246 .036a6 6 0 0 1 3.364 10.008l-.18 .185l-.048 .041l-7.45 7.379a1 1 0 0 1 -1.313 .082l-.094 -.082l-7.493 -7.422a6 6 0 0 1 3.176 -10.215z" stroke-width="0" fill="currentColor" /></svg>--}}
{{--                            @endif--}}
{{--                            {{ $article->likes_count }}--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

