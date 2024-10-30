<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart($id)
    {
        // Retrieve the dish by ID
        $dish = Dish::findOrFail($id);

        Cart::add($id, $dish->title, 1, $dish->price);
        return redirect()->back()->with('success', 'Article ajouté au panier avec succès !');

    }
}
