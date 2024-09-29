<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return Rating::all();
    }

    public function store(Request $request, $dishId)
    {
        $request->validate([
            'dish_id' => ['required', 'exists:dishes'],
            'user_id' => ['required', 'exists:users'],
            'rating' => 'required|integer|min:1|max:5',
        ]);


        $dish = Dish::findOrFail($dishId);

        // Create a new rating for the dish
        Rating::create([
            'dish_id' => $dish->id,
            'user_id' => auth()->id(),  // Assume user is authenticated
            'rating' => $request->input('rating'),
        ]);

        // Update the average rating of the dish
        $dish->average_rating = $dish->ratings()->avg('rating');
        $dish->save();

        return redirect()->back()->with('success', 'Thanks for your rating!');
    }

    public function show(Rating $rating)
    {
        return $rating;
    }

    public function update(Request $request, Rating $rating)
    {
        $data = $request->validate([
            'dish_id' => ['required', 'exists:dishes'],
            'user_id' => ['required', 'exists:users'],
            'rating' => ['required', 'integer'],
        ]);

        $rating->update($data);

        return $rating;
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return response()->json();
    }
}
