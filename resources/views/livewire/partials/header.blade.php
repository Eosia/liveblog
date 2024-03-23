<div>
    <header class="navbar navbar-expand-md navbar-light d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a wire:navigate href="{{ route('home') }}">
                    <img src="{{ Vite::asset('resources/static/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
            <div class="flex-row navbar-nav order-md-last">
{{--                <div class="d-none d-md-flex">--}}
{{--                    <div class="nav-item dropdown d-none d-md-flex me-3">--}}
{{--                        <a href="#" class="px-0 nav-link" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">--}}
{{--                            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>--}}
{{--                            <span class="badge bg-red"></span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header">--}}
{{--                                    <h3 class="card-title">Last updates</h3>--}}
{{--                                </div>--}}
{{--                                <div class="list-group list-group-flush list-group-hoverable">--}}
{{--                                    <div class="list-group-item">--}}
{{--                                        <div class="row align-items-center">--}}
{{--                                            <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>--}}
{{--                                            <div class="col text-truncate">--}}
{{--                                                <a href="#" class="text-body d-block">Example 1</a>--}}
{{--                                                <div class="d-block text-muted text-truncate mt-n1">--}}
{{--                                                    Change deprecated html tags to text decoration classes (#29604)--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <a href="#" class="list-group-item-actions">--}}
{{--                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="list-group-item">--}}
{{--                                        <div class="row align-items-center">--}}
{{--                                            <div class="col-auto"><span class="status-dot d-block"></span></div>--}}
{{--                                            <div class="col text-truncate">--}}
{{--                                                <a href="#" class="text-body d-block">Example 2</a>--}}
{{--                                                <div class="d-block text-muted text-truncate mt-n1">--}}
{{--                                                    justify-content:between ⇒ justify-content:space-between (#29734)--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <a href="#" class="list-group-item-actions show">--}}
{{--                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="list-group-item">--}}
{{--                                        <div class="row align-items-center">--}}
{{--                                            <div class="col-auto"><span class="status-dot d-block"></span></div>--}}
{{--                                            <div class="col text-truncate">--}}
{{--                                                <a href="#" class="text-body d-block">Example 3</a>--}}
{{--                                                <div class="d-block text-muted text-truncate mt-n1">--}}
{{--                                                    Update change-version.js (#29736)--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <a href="#" class="list-group-item-actions">--}}
{{--                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="list-group-item">--}}
{{--                                        <div class="row align-items-center">--}}
{{--                                            <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>--}}
{{--                                            <div class="col text-truncate">--}}
{{--                                                <a href="#" class="text-body d-block">Example 4</a>--}}
{{--                                                <div class="d-block text-muted text-truncate mt-n1">--}}
{{--                                                    Regenerate package-lock.json (#29730)--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-auto">--}}
{{--                                                <a href="#" class="list-group-item-actions">--}}
{{--                                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                    @auth()
                    <div class="nav-item dropdown">
                        <a href="#" class="p-0 nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Paweł Kuna</div>
                                <div class="mt-1 small text-muted">UI Designer</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Mes articles</a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                    @endauth
            </div>
        </div>
    </header>
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar navbar-light">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" wire:navigate>
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                                <span class="nav-link-title">
                      Home
                    </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h6v6h-6z"></path>
                                    <path d="M14 4h6v6h-6z"></path>
                                    <path d="M4 14h6v6h-6z"></path>
                                    <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                </svg>
                                <span class="nav-link-title">
                      Catégories
                    </span>
                            </a>
                            <div class="dropdown-menu">
                                @foreach($this->categories as $category)
                                <a class="dropdown-item" href="{{ route('category', $category->slug) }}"
                                    wire:navigate
                                >
                                    {{ $category->name }}
                                </a>
                                @endforeach
                            </div>
                        </li>

                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                    <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                                </svg>
                                <span class="nav-link-title">
                            Connexion
                    </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M16 19h6"></path>
                                    <path d="M19 16v6"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                </svg>
                                <span class="nav-link-title">
                      Inscription
                    </span>
                            </a>
                        </li>
                        @endguest

                        @auth()
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" >
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-scan"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 9a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M4 8v-2a2 2 0 0 1 2 -2h2" /><path d="M4 16v2a2 2 0 0 0 2 2h2" /><path d="M16 4h2a2 2 0 0 1 2 2v2" /><path d="M16 20h2a2 2 0 0 0 2 -2v-2" /><path d="M8 16a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2" /></svg>
                                    <span class="nav-link-title">
                                Mon compte
                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" >
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-logout"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                                    <span class="nav-link-title">
                            Déconnexion
                    </span>
                                </a>
                            </li>
                        @endauth

                    </ul>
                    <!-- <div class="order-first my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-md-last">
                      <form action="./" method="get" autocomplete="off" novalidate>
                        <div class="input-icon">
                          <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                          </span>
                          <input type="text" value="" class="form-control" placeholder="Rechercher" aria-label="Search in website">
                        </div>
                      </form>
                    </div> -->
                </div>
            </div>
        </div>
    </header>
</div>
