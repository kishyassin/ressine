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

    public function store(Request $request)
    {
        // Validate the rating input
        $request->validate([
            'dish_id' => 'required|exists:dishes,id',
            'rating' => 'required|integer|min:1|max:5', // Ensure rating is between 1 and 5
        ]);

        // Store or update the rating
        Rating::updateOrCreate(
            [
                'user_id' => \Auth::id(),   // Current user
                'dish_id' => $request->dish_id  // The dish being rated
            ],
            ['rating' => $request->rating]  // The new or updated rating value
        );

        // Find the dish by dish_id from the request
        $dish = Dish::findOrFail($request->dish_id);

        // Update the average rating of the dish
        $dish->average_rating = $dish->ratings()->avg('rating');
        $dish->save();

        return redirect()->back()->with('success', 'Your rating has been submitted.');
    }


    public function show(Rating $rating)
    {
        return $rating;
    }

    public function update(Request $request, $dish_id)
    {
        $data = $request->validate([
            'dish_id' => ['required', 'exists:dishes'],
            'user_id' => ['required', 'exists:users'],
            'rating' => ['required', 'integer'],
        ]);
        $user_id = \Auth::id();
        $rating = Rating::where('user_id', $user_id)->where('dish_id', $dish_id)->first();
        $rating->update($data);
        $dish = Dish::findOrFail(request('dish_id'));
        $dish->average_rating = $dish->ratings()->avg('rating');
        $dish->save();
        return $rating;
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return response()->json();
    }
}
