<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'phone' => $faker->e164PhoneNumber,
        'address' => $faker->address,
    ];
});
