<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class HomeController extends Controller
{
    public function index()
    {
        $dish = new Dish();
        $featuredDishes = $dish->getFeaturedDishes();
        $topSevenDishes = $dish->getTopSevenDishes();
        return view('index', compact('featuredDishes', 'topSevenDishes'));
    }
}
