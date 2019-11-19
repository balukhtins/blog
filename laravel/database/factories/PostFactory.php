<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;
use \Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(7);
    $views = $faker->numberBetween(0,500);
    $body = $faker->paragraphs(10,$asText = false);
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'short_description' => implode("",$body),
        'body' => "<p>".implode('</p><p>',$body)."</p>",
        'views' => $views,
        'likes' => $faker->numberBetween(0,$views),
        'published_status' => $faker->randomElement(config('custom.enum.published_status')),
    ];
});
