<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Livre;
use Faker\Generator as Faker;

$factory->define(Livre::class, function (Faker $faker) {
    return [
        'title' => $faker->text(30),
        'pages' => $faker->numberBetween(100, 322),
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
    ];
});
