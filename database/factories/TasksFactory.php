<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,11),
        'completed' => $faker->boolean,
        'body' => $faker->sentence,
        'due_date' => $faker->dateTimeBetween('+0 days', '+1 week'),
        'priority' => rand(1,4)
    ];
});
