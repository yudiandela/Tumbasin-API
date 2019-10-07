<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $title = $faker->unique()->sentence();
    $unit  = ['pcs', 'bks', 'gram', 'box'];

    return [
        'category_id' => rand(1, 7),
        'title'       => $title,
        'slug'        => Str::slug($title),
        'description' => $faker->paragraph(3, true),
        'image'       => 'https://placeimg.com/120/120/tech',
        'price'       => $faker->numberBetween(10000, 100000),
        'unit'        => $faker->randomElement($unit),
        'stock'       => $faker->numberBetween(10000, 100000),
    ];
});
