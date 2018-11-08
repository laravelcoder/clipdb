<?php

$factory->define(App\Ftp::class, function (Faker\Generator $faker) {
    return [
        "ftp_server" => $faker->name,
        "ftp_directory" => $faker->name,
        "ftp_username" => $faker->name,
        "ftp_password" => str_random(10),
        "notes" => $faker->name,
    ];
});
