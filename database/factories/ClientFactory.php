<?php

use Faker\Generator as Faker;

require_once __DIR__ . '/../faker_data/document_number.php';

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'defaulter' => rand(0,1),
    ];
});

$factory->state(\App\Client::class, \App\Client::TYPE_INDIVIDUAL, function (Faker $faker) {
    $cpfs = cpfs();
    return [
        'date_birth' => $faker->date(),
        'document_number' => $cpfs[array_rand($cpfs,1)],
        'sex' => rand(1,10) % 2 == 0 ? 'm' : 'f',
        'marital_status' => rand(1,3),
        'physical_desability' => rand(1,10) % 2 == 0 ? $faker->word : null,
        'client_type' => \App\Client::TYPE_INDIVIDUAL,
    ];
});

$factory->state(\App\Client::class, \App\Client::TYPE_LEGAL, function (Faker $faker) {
    $cnpjs = cnpjs();
    return [
        'company_name' => $faker->company,
        'document_number' => $cnpjs[array_rand($cnpjs,1)],
        'client_type' => \App\Client::TYPE_LEGAL,
    ];
});