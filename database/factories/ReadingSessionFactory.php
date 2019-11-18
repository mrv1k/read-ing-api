<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReadingSession;
use Faker\Generator as Faker;

$factory->define(ReadingSession::class, function (Faker $faker, callable $attributes) {
    return [
        'start' => 1,
        'end' => 26,
        'book_id' => factory(App\Models\Book::class),
    ];
});
