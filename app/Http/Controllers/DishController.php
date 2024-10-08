<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{


    public function index()
    {
        return Dish::all();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'imageSlide' => ['nullable'],
            'imageHero' => ['nullable'],
            'imageIcon' => ['nullable'],
            'category_id' => ['required', 'exists:categories'],
        ]);

        return Dish::create($data);
    }

    public function show(Dish $plat)
    {
        return $plat;
    }

    public function update(Request $request, Dish $plat)
    {
        $data = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'imageSlide' => ['nullable'],
            'imageHero' => ['nullable'],
            'imageIcon' => ['nullable'],
            'category_id' => ['required', 'exists:categories'],
        ]);

        $plat->update($data);

        return $plat;
    }

    public function destroy(Dish $plat)
    {
        $plat->delete();

        return response()->json();
    }
}
