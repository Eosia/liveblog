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

                    @livewire('criteria', ['sort' => $sort, 'direction' => $direction, 'search' => $search] )


{{--                    <div class="d-flex justify-content-end">--}}
{{--                        <div class="col-auto ms-auto d-print-none">--}}
{{--                            <form action="">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="me-3">--}}
{{--                                        <select wire:model="sort" wire:change="updateSort" class="form-select">--}}
{{--                                            <option value="">Trier</option>--}}
{{--                                            <option value="date">Date</option>--}}
{{--                                            <option value="author">Auteur</option>--}}
{{--                                            <option value="category">Catégorie</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

{{--                                    <div class="me-3">--}}
{{--                                        <select wire:model="direction" wire:change="updateSort" class="form-select">--}}
{{--                                            <option value="asc">Ascendant</option>--}}
{{--                                            <option value="desc">Descendant</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">

                    @forelse($articles as $article)
                        <livewire:card :article="$article" :key="$article->id">

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
