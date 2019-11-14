<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'pages' => (int) $faker->biasedNumberBetween(1, 101),
        'user_id' => factory(App\Models\User::class),
    ];
});
