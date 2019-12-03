<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;
use App\Models\ReadingSession;

$factory->define(ReadingSession::class, function (Faker $faker, $attrs) {
    $start = (array_key_exists('start', $attrs)) ? $attrs['start'] : 1;
    $end = $start + 25;

    return [
        'start' => $start,
        'end' => $end,
        'book_id' => factory(Book::class),
    ];
});
