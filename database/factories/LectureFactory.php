<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lecture;
use Faker\Generator as Faker;

$factory->define(Lecture::class, function (Faker $faker) {

    $start = (int) $faker->biasedNumberBetween(1, 100);
    $livre = factory(App\Models\Livre::class)->create();

    return [
        'livre_id' => $livre->id,
        'user_id' => $livre->user_id,
        'start' => $start,
        'end' => $start + 25,
    ];
});
