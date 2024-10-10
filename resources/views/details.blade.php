@extends('layouts.ressine')
@section('content')
    <div class="container-fluid py-5 bg-dark hero-header"
         style="background: linear-gradient(rgba(15, 23, 43, .9), rgba(15, 23, 43, .4)), url('{{ Storage::url($details->imageHero)  }}'); background-size: cover; background-position: center">
        <div class="container-fluid text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $details->title }}</h1>
        </div>
    </div>
    <div class="container py-5 mt-5">

        <div class="row">
            <div class="swiper-wrapper d-flex justify-content-center col-md-12 col-xl-6 m-0 p-0 ">
                <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <img src="{{ Storage::url($details->imageSlide) }}" alt="Tranding">
                    </div>
                    <div class="tranding-slide-content">
                        <h1 class="food-price">{{ Number::currency($details->price,'mad') }}</h1>
                        <div class="tranding-slide-content-bottom">
                            <h2 class="food-name">
                                {{ $details->title }}
                            </h2>
                            <h5 class="food-rating">
                                <span>{{$details->average_rating}}</span>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $details->average_rating)
                                            <i class="fa-solid fa-star text-primary"></i>
                                        @else
                                            <i class="fa-regular fa-star text-primary"></i>
                                        @endif
                                    @endfor
                                </div>
                            </h5>
                            <div class="w-100 row">
                                <div class="col p-1">
                                    <a href=""
                                       class="w-100 p-2 rounded-full btn btn-primary">Ajouter Au Panier <i
                                            class="fa fa-shopping-cart"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="display-4">{{ $details->title }}</h1>
                <p class="lead">{{ $details->description }}</p>
                <p class="h4">Prix: {{ Number::currency($details->price, 'mad') }}</p>
                @auth
                    @if($userHasRated)
                        <div id="staticRating" class="rating">
                            <!-- Static Star Display -->
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $userRatingValue)
                                    <i class="fa-solid fa-star text-primary"></i>
                                @else
                                    <i class="fa-regular fa-star text-primary"></i>
                                @endif
                            @endfor
                            <p>Vous avez donné ce plat {{ $userRatingValue }} / 5</p>
                            <button id="modifyBtn" class="btn btn-outline-primary fw-light small py-0 px-2 rounded-4">
                                Modifier?
                            </button>
                        </div>

                        <!-- Hidden form for modifying rating -->
                        <div id="ratingForm" class="mt-4" style="display:none;">
                            <form action="{{ route('rating.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="dish_id" value="{{ $details->id }}">

                                <div class="rating-css">
                                    <!-- Radio buttons styled as stars -->
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="rating{{ $i }}" name="rating"
                                               value="{{ $i }}" {{ $userRatingValue == $i ? 'checked' : '' }}>
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Valider</button>
                            </form>
                        </div>
                    @else
                        <div class="mt-4">
                            <form action="{{ route('rating.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="dish_id" value="{{ $details->id }}">

                                <div class="rating-css">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <input type="radio" id="rating{{ $i }}" name="rating" value="{{ $i }}" checked>
                                        <label for="rating{{ $i }}" class="fa fa-star"></label>
                                    @endfor
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Valider</button>
                            </form>
                        </div>
                    @endif
                @else
                    <p class="mt-4">Veuillez vous <a href="{{ route('login') }}">connecter</a> pour évaluer ce plat.</p>
                @endauth


                <br>
                <img src="{{Storage::url($details->imageIcon)}}" alt="Product image" class="mt-2 object-cover">
                <br>
                <a href="" class="btn btn-primary mt-3">Commander maintenant <i class="fa fa-shopping-cart"
                                                                                aria-hidden="true"></i></a>
            </div>
        </div>

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
                    icon: "success"
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
