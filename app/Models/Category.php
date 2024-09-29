<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','description','icon'];
    protected function casts()
    {
        return [
            'timestamps' => 'timestamp',
        ];
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }
}
