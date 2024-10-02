<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.svg') }}"/>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet"/>

    <!-- Popular Items Style -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<div class="container-fluid p-0 bg-light">

    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
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
                        <a href="" class="nav-item nav-link"><i class="fa fa-shopping-cart"
                                                                aria-hidden="true"></i></a>
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
    <!-- Navbar End -->
    <!-- hero start -->
    <div class="container-xxl col-12 d-flex overflow-hidden slider">
        <div class="list">
            @foreach ($featuredDishes as $dish)
                @if ($dish)
                    <div class="col-12 py-5 bg-dark hero-header item d-flex align-items-center justify-content-center"
                         id="slide-{{ $dish->id }}"
                         style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .4)), url('{{ Storage::url($dish->imageHero)  }}'); background-size: cover; background-position: center">
                        <div class="container my-5 py-2">
                            <div class="row justify-content-center align-items-center g-5">
                                <div class="col-lg-7 text-center wow fadeInUp">
                                    <h1 class="display-4 text-white">{{ $dish->category->title }}<br>
                                        <a href="" class="stop-slider-when-hovered">
                                            {{ $dish->title}}
                                        </a>
                                    </h1>
                                    <p class="text-white mx-4 mb-4 pb-2">{{ $dish->description }}</p>
                                    <a href=""
                                       class="btn btn-primary py-sm-3 px-sm-5 me-3 fw-bold rounded-full booking-link stop-slider-when-hovered">
                                        <span class="fw-bold">{{ Number::currency($dish->price,'mad') }}</span> |
                                        Commander <i
                                            class="fa fa-shopping-cart"
                                            aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="buttons">
            <button id="prev" class="wow fadeInRight stop-slider-when-hovered">
                <
            </button>
            <button id="next" class="wow fadeInLeft stop-slider-when-hovered">></button>
        </div>
    </div>
    <!-- hero end -->


    <div class="container-fluid mt-5 wow fadeInUp p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <section id="tranding" class=" container-fluid p-0 m-0">
                <div class="container-fluid p-0 m-0">
                    <div class="text-center" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menu</h5>
                        <h1 class="mb-2">Plat Tendance</h1>
                    </div>
                    <div class="swiper tranding-slider">
                        <div class="swiper-wrapper">
                            <!-- Slide-start -->
                            @foreach ($topSevenDishes as $dish)
                                <div class="swiper-slide tranding-slide">
                                    <div class="tranding-slide-img">
                                        <img src="{{ Storage::url($dish->imageSlide) }}" alt="Tranding">
                                    </div>
                                    <div class="tranding-slide-content">
                                        <h1 class="food-price">{{ Number::currency($dish->price,'mad') }}</h1>
                                        <div class="tranding-slide-content-bottom">
                                            <h2 class="food-name">
                                                <a href="">
                                                    {{ $dish->title }}
                                                </a>
                                            </h2>
                                            <h5 class="food-rating">
                                                <span>{{ $dish->average_rating }}</span>
                                                <div class="rating">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $dish->average_rating)
                                                            <i class="fa-solid fa-star text-primary"></i>
                                                        @else
                                                            <i class="fa-regular fa-star text-primary"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </h5>
                                            <div class="w-100 row">
                                                <div class="col-6 p-1">
                                                    <a href=""
                                                       class="w-100 p-2 rounded-full btn btn-outline-primary">Découvrir
                                                    </a>
                                                </div>
                                                <div class="col-6 p-1">
                                                    <a href=""
                                                       class="w-100 p-2 rounded-full btn btn-primary">Ajouter Au Panier
                                                        <i
                                                            class="fa fa-shopping-cart"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            <!-- Slide-end -->
                        </div>

                        <div class="tranding-slider-control">
                            <div class="swiper-button-prev slider-arrow">
                                <ion-icon name="arrow-back-outline"></ion-icon>
                            </div>
                            <div class="swiper-button-next slider-arrow">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>


    <!-- panorama start -->
    <div class="container-fluid my-5">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Notre restaurant</h5>
            <h1 class="mb-2"><span class=" text-primary">Ressine</span> de l’intérieur</h1>
        </div>
        <div id="panorama" class=" my-2 rounded-5 shadow wow fadeInUp"></div>
    </div>
    <!-- panorama end -->

    {{--    footer start--}}
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="text-primary m-0 d-flex">
                        <img src="{{ asset('img/logo.svg') }}" alt="Logo" class=" d-inline-block h-100 w-50">
                    </h1>
                    <h1>
                        <span class="text-primary  h-100 align-bottom align-self-end">Ressine</span>
                    </h1>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Errachidia </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>ressine@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Ouverture</h4>
                    <h5 class="text-light fw-normal">Lundi - Samedi</h5>
                    <p>09h - 21h</p>
                    <h5 class="text-light fw-normal">Dimanche</h5>
                    <p>10h - 20h</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">liens utils </h4>

                    <p class="mb-2"><a href="/admin">Admin </a>|<a href="/chef"> Chef </a>|<a href="/livreur"> Livreur
                        </a></p>
                    <form class="position-relative mx-auto" action="{" method="POST"
                          style="max-width: 400px;">
                        @csrf
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" name="message"
                               placeholder="Votre Message" required>
                        <button type="submit" class="btn btn-primary py-2 mt-2 me-2">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center text-md-center mb-3 mb-md-0">
                        © 2024 Ressine - Tous droits réservés
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    footer end--}}
</div>


<!-- bacvk to top button  -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- popular items slider -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
