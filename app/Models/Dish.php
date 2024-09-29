<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['title', 'description', 'price', 'imageSlide', 'imageHero', 'imageIcon', 'category_id', 'featured'];

    public function getFeaturedDishes()
    {
        $featuredPlats = $this->with('category')->where('featured', '1')->get();
        return $featuredPlats;
    }

    public function getTopSevenDishes()
    {
        $bestSevenDishes = $this->with('category')->orderByDesc('average_rating')->take(7)->get();
        return $bestSevenDishes;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
