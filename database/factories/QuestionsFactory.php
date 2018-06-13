<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,6),
        'user_id' => rand(1,11),
        'question' => $faker->sentence,
        'resolved' => $faker->boolean
    ];
});
