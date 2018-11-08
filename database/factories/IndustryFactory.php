<?php

$factory->define(App\Industry::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "slug" => $faker->name,
        "clip_id" => factory('App\Clip')->create(),
    ];
});
