<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use App\Enums\Genre;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(50),
        'director' => $faker->name(50),
        'year' =>$faker->year(),
        'genre' => Genre::Action,
        'budget' => $faker->numberbetween(1,100),
        'description' => $faker->text(100),
    ];
});
