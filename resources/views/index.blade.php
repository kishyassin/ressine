@extends('layouts.ressine')
@section('content')
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
                                        <a href="{{route("details",$dish->id)}}" class="stop-slider-when-hovered">
                                            {{ $dish->title}}
                                        </a>
                                    </h1>
                                    <p class="text-white mx-4 mb-4 pb-2">{{ $dish->description }}</p>
                                    <a href="{{route("cart.add",$dish->id)}}"
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
                                                <a href="{{route("details",$dish->id)}}">
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
                                                    <a href="{{route("details",$dish->id)}}"
                                                       class="w-100 p-2 rounded-full btn btn-outline-primary">Découvrir
                                                    </a>
                                                </div>
                                                <div class="col-6 p-1">
                                                    <a href="{{route("cart.add",$dish->id)}}"
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
@endsection

@section('scripts')

    <!-- JavaScript to toggle between static rating and form -->
    <script>
        document.getElementById('modifyBtn').addEventListener('click', function () {
            document.getElementById('staticRating').style.display = 'none';
            document.getElementById('ratingForm').style.display = 'block';
        });
    </script>


    @if(Session::has('success'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    title: "Bien",
                    text: "{{Session::get('success')}}",
                    icon: "success",
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Voir Panier'
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.cancel) {
                        window.location.href = "{{ route('cart.index') }}";
                    }
                });
            })
        </script>
    @endif

    @if(Session::has('error'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    title: "Ooops",
                    text: "{{Session::get('error')}}",
                    icon: "error"
                });
            })
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
