<?php

namespace App\Models;

use App\Models\Review;
use App\Enums\Genre;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'director', 'year', 'budget', 'duration', 'rating', 'genre', 'poster_url','plot', 'cast'
    ];

    public static function rules() {
        return [
            'name' => 'required|max:100',
            'director' => 'required|max:100',
            'year' => 'numeric|between:1900,' . Carbon::now()->year,
            'budget' => 'numeric|between:0,300',
            'duration' => 'numeric|between:1,300',
            'rating' => 'integer|between:0,5',
            'poster_url' => ['required',new \App\Rules\UrlValidator]
        ];
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }

    public function getGenreDisplay() {
        $g = Genre::from($this->genre);
        //$g = new Genre($this->genre);
        return $g->getValue();
    }
}
