@extends('layouts.ressine')
@section('content')
    <div class="container py-5">
        <h1 class="display-4 text-center my-5">Votre Panier</h1>
        @if(Cart::count() > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="list-group">
                        @foreach(Cart::content() as $item)
                            <div
                                class="list-group-item d-flex justify-content-between align-items-center flex-column flex-lg-row">
                                <div class="d-flex align-items-center">
                                    <img src="{{ Storage::url($item->options->imageIcon) }}" alt="{{ $item->name }}"
                                         class="img-thumbnail" style="width: 100px; height: 100px;">
                                    <div class="ms-3">
                                        <h5 class="mb-1">{{ $item->name }}</h5>
                                        <p class="mb-1">{{ $item->description }}</p>
                                        <p class="mb-1">Prix: {{ Number::currency($item->price, 'mad') }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3 mt-lg-0">
                                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST"
                                          class="d-flex">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $item->qty }}"
                                               class="form-control me-2" style="width: 60px;" min="0">
                                        <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
                                    </form>
                                    <form action="{{ route('cart.remove', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Résumé de la commande</h5>
                            <p class="card-text">Total des articles: {{ Cart::count() }}</p>
                            <p class="card-text">Total: {{ Number::currency(Cart::subtotal(), 'mad') }}</p>
                            <a href="{{ route('checkout') }}" class="btn btn-primary w-100">Passer à la caisse</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info text-center">
                Votre panier est vide.
            </div>
        @endif
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
