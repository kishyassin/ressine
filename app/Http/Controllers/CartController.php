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

        Cart::add($id, $dish->title, 1, $dish->price, 0, ['imageIcon' => $dish->imageIcon]);
        return redirect()->back()->with('success', 'Article ajouté au panier avec succès !');
    }

    public function index()
    {
        return view('cart');
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('success', 'Article retiré du panier avec succès !');
    }

    public function updateCart($rowId)
    {
        Cart::update($rowId, request('quantity'));
        return redirect()->back()->with('success', 'Quantité mise à jour avec succès !');
    }
}
