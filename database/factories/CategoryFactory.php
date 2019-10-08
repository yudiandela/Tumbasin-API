<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $array = getCategoriesArray($faker);
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
function getCategoriesArray($faker)
{
    return $faker->unique()->randomElement([
        [
            'name'  => 'JAJANAN',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_jajanpasar1.png'
        ],
        [
            'name'  => 'BUMBU',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_bumbu1.png'
        ],
        [
            'name'  => 'SAYURAN',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sayuran1.png'
        ],
        [
            'name'  => 'LAUK PAUK',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_daging1.png'
        ],
        [
            'name'  => 'SEAFOOD',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_seafood1.png'
        ],
        [
            'name'  => 'SEMBAKO',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_sembako1.png'
        ],
        [
            'name'  => 'BUAH',
            'image' => 'https://wp.tumbasin.id/wp-content/uploads/2019/06/img_buah1.png'
        ]
    ]);
}
