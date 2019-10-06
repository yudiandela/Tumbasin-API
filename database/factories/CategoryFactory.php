<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $name = $faker->unique()->sentence(2, true);

    return [
        'name'        => strtoupper($name),
        'slug'        => Str::slug($name),
        'image'       => 'https://placeimg.com/120/120/tech',
        'description' => $faker->paragraphs(2, true),
    ];
});
