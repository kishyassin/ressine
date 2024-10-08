<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Rating;

class DetailsController extends Controller
{
    public function details($id)
    {
        // Get the details of the dish by ID
        $details = (new Dish())->getDishDetails($id);

        // Initialize the user rating status and value
        $userHasRated = false;
        $userRatingValue = null;

        // Check if the user is authenticated
        if (\Auth::check()) {
            $user_id = \Auth::id(); // Get the authenticated user's ID

            // Fetch the user's rating for this dish, if it exists
            $userRating = Rating::where('dish_id', $id)
                ->where('user_id', $user_id)
                ->first();

            // If the user has rated this dish, store the rating value
            if ($userRating) {
                $userHasRated = true;
                $userRatingValue = $userRating->rating;  // Get the actual rating value
            }
        }

        // If dish details are found, return the view with the dish details and rating info
        if ($details) {
            return view('details', compact('details', 'userHasRated', 'userRatingValue'));
        }

        // Redirect to a fallback route (e.g., home page or 404) if no details are found
        return redirect()->route('home')->with('error', 'Dish not found');
    }

}
