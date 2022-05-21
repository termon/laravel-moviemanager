<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public static function make(int $movie_id) {
        $review = new Review();
        $review->movie_id = $movie_id;
        $review->on = Carbon::now();
        return $review;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'on', 'rating', 'comment', 'movie_id'
    ];

    public function movie() {
        return $this->belongsTo('\App\Models\Movie');
    }

}
