<?php

$factory->define(App\Brand::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "brand_url" => $faker->name,
        "clip_id" => factory('App\Clip')->create(),
    ];
});
