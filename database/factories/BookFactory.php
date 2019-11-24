<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'pages' => (int) $faker->biasedNumberBetween(99, 322),
        'user_id' => auth()->user() ? auth()->user()->id : factory(App\Models\User::class),
    ];
});
