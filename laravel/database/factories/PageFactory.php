<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Page;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(Page::class, function (Faker $faker) {
    $name = $faker->sentence(7);
    $views = $faker->numberBetween(0,500);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'body' => $faker->paragraph(10),
        'views' => $views,
    ];
});
