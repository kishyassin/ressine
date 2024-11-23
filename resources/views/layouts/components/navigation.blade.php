<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <h2 class="text-primary m-0 d-flex">
            <img src="{{ asset('img/logo.svg') }}" alt="Logo" class="d-inline-block h-100 w-auto">
            <span class="h-100 align-bottom align-self-end">Ressine</span>
        </h2>
    </a>

    <!-- Toggle button for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapsee navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
            <a href="/about" class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}">à propos</a>
            <a href="/menu" class="nav-item nav-link {{ request()->is('menu') ? 'active' : '' }}">Menu</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Reserver</a>
                <div class="dropdown-menu m-0">
                    <a href="#" class="dropdown-item">petit déjeuner</a>
                    <a href="#" class="dropdown-item">déjeuner</a>
                    <a href="#" class="dropdown-item">dîner</a>
                </div>
            </div> --}}
            <a href="/contact" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
            <a href="{{route("cart.index")}}" class="nav-item nav-link"><i class="fa fa-shopping-cart"
                                                                           aria-hidden="true"></i></a>

            @if (Route::has('login'))
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-item nav-link"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">modifier</a>
                            <a href="/app" class="dropdown-item">dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Déconnecter') }}
                                </a>
                            </form>
                        </div>
                    </div>

                @else
                    <div
                        class="sm:top-0 sm:right-0 ps-3 d-flex align-items-center justify-content-center text-right">
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-full">se connecter</a>
                    </div>
                @endauth
            @endif

        </div>
    </div>
</nav>
