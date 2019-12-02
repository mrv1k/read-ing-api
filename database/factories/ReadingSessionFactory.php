<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;
use App\Models\ReadingSession;

$factory->define(ReadingSession::class, function (Faker $faker) {
    return [
        'start' => 1,
        'end' => 26,
        'book_id' => factory(Book::class),
    ];
});

$factory->state(ReadingSession::class, 'finishedBook', function () {
    $book = factory(Book::class)->create();

    $readingSessionPayloads = [
        [
            'start' => 1,
            'end' => 26,
            'book_id' => $book->id,
        ],
        [
            'start' => 26,
            'end' => 51,
            'book_id' => $book->id,
        ],
    ];

    $readingSessions = [];

    foreach ($readingSessionPayloads as $payloads) {
        $t = factory(ReadingSession::class)->make();
        array_push($readingSessions, $t);
    }

    // dd($readingSessions);
    return $readingSessions;
});
