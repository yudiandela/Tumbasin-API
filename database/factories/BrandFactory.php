<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {

    $array = getBrandsArray($faker);
    $name  = Arr::get($array, 'name');
    $image = Arr::get($array, 'image');

    return [
        'name'  => strtoupper($name),
        'slug'  => Str::slug($name),
        'image' => $image
    ];
});

/**
 * Mengambil data Name dari Array
 *
 * @param   $faker
 * @return  Array
 */
function getBrandsArray($faker)
{
    return $faker->unique()->randomElement([
        [
            'name'  => 'AJINOMOTO',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_ajinomoto1.png'
        ],
        [
            'name'  => 'INDOFOOD',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_indofood.png'
        ],
        [
            'name'  => 'NESTLE',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_nestle-1.png'
        ],
        [
            'name'  => 'SASA',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/logo_sasa.png'
        ]
    ]);
}
