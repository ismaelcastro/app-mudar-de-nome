<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\TopQuestion::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'question' => $faker->text,
        'answer' => $faker->text,
        'order' => rand(1, 9),
    ];
});
