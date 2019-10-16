<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $number      = rand(0, count(getName()) - 1);
    $name        = Arr::get(getName(), $number);
    $image       = Arr::get(getImages(), $number);
    $units       = getUnits($faker);
    $description = $faker->paragraphs(6, true);

    return [
        'category_id'       => rand(1, 7),
        'name'              => $name,
        'slug'              => Str::slug($name),
        'short_description' => Str::limit($description),
        'description'       => $description,
        'image'             => $image,
        'brand_id'          => $faker->numberBetween(1, 4),
        'price'             => $faker->numberBetween(10000, 100000),
        'unit'              => $units,
        'stock'             => $faker->numberBetween(100, 200),
        'weight'            => $faker->numberBetween(0, 20),
        'length'            => $faker->numberBetween(0, 20),
        'width'             => $faker->numberBetween(0, 20),
        'height'            => $faker->numberBetween(0, 20)
    ];
});

/**
 * Mengambil data Unit dari Array
 *
 * @param   $faker
 * @return  Array
 */
function getUnits($faker)
{
    return $faker->randomElement(['pcs', 'bks', 'gram', 'box']);
}

/**
 * Mengambil data Nama Product
 *
 * @return  Array
 */
function getName()
{
    return [
        'Asam Jawa',
        'Asam Kandis',
        'Bawang Merah',
        'Bawang Merah Giling',
        'Bawang Merah Kupas',
        'Bawang Putih',
        'Bawang Putih Giling',
        'Bawang Putih Kupas',
        'Bumbu Bacem',
        'Bumbu Balado',
        'Bumbu Bali',
        'Bumbu Gongso',
        'Bumbu Gulai',
        'Bumbu Indofood Opor Ayam',
        'Bumbu Indofood Rendang',
        'Bumbu Mangut',
        'Bumbu Opor',
        'Bumbu Rica-rica',
        'Bumbu Sambal Goreng',
        'Bumbu Sasa Bakwan',
        'Bumbu Sasa Kentucky',
        'Bumbu Sasa Pisang Goreng',
        'Bumbu Semur',
        'Bumbu Sop',
        'Bumbu Soto',
        'Bumbu Ungkep',
        'Cabai Hijau Besar',
        'Cabai Hijau Keriting',
        'Cabai Hijau Rawit',
        'Cabai Merah Besar',
        'Cabai Merah Keriting',
        'Cabai Setan',
        'Cengkeh',
        'Cuka Dixi',
        'Daun Jeruk',
        'Daun Kunyit',
        'Daun Pandan',
        'Daun Salam',
        'Daun Sirih',
        'Jahe Besar',
        'Jahe Emprit',
        'Jahe Giling',
        'Jahe Kapur',
        'Jahe Merah',
        'Kapolaga',
        'Kayu Manis',
        'Kecap Bango',
        'Kelapa Parut',
        'Kemiri',
        'Kemiri Giling',
        'Kencur',
        'Ketumbar',
        'Ketumbar Bubuk',
        'Kluwak',
        'Kunir Putih',
        'Kunyit',
        'Kunyit bubuk',
        'Kunyit Giling',
        'Lengkuas',
        'Lengkuas Giling',
        'Masako Rasa Ayam',
        'Masako Rasa Sapi',
        'Merica Bubuk',
        'Merica/Lada',
        'Moto Cap Mobil',
        'Pala',
        'Pala Bubuk',
        'Pekak',
        'Penyedap Rasa Maggi',
        'Santan Kara (65 ml)',
        'Saus ABC',
        'Saus indofood',
        'Serai',
        'Temulawak',
        'Temulawak Kering',
        'Terasi Besar',
        'Terasi Kecil'
    ];
}

/**
 * Mengambil data Images dari Array
 *
 * @return  Array
 */
function getImages()
{
    return [
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/asam-jawa_20150430_140800-compressor.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/asam-kandis-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Bawang-Merah-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bawang-merah-giling-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Bawang-Merah-Kupas-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bawang-putih-compressor.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bawang-putih-giling-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bawang-putih-kupas-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bacem-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/balado.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bali-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bumbu-gongso-bumbu.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Resep-Gulai-Kambing-compressor.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/opor-ayam.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/rendang.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/bumbu-mangut-bumbu.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/opor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/rica-rica.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/sambal-goreng.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/tepung-bakwan.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/tepung-kentacky.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/tepung-pisang.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/semur-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/sop.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/soto.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/ungkep-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cabe-hijau-besar.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cabe-hijau-keriting.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cabe-rawit-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cabe-merah-besar.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cabe-merah-keriting.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cabe-setan.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cengkeh-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/cuka-dixi-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-jeruk-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-kunyit.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-pandan-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-salam-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-sirih-bumbu.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/jahe-besar-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Khasiat-Manfaat-Jahe-Emprit-atau-Jahe-Sunti.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/jahe-giling-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/jahe-kapur-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/jahe-merah.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kapolaga-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kayu-manis-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kecap-bango-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kelapa-parut-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kemiri-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kemiri-giling-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kencur1-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/ketumbar-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/ketumbar-bubuk-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kluwak-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kunir-putih-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Kunyit-compressor-1.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kunyit-bubuk.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kunyit-giling-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/lengkuas-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/lengkuas-giling-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/masako-ayam.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/masako-sapi.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/merica-bubuk-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/merica-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/moto.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Pala-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/pala-bubuk-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/Pekak-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/07/magic.jpg',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/kara-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/saus-abc.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/saus-indofood.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/daun-serai-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/temulawak-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/temulawak-kering-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/terasi-besar-compressor.png',
        'https://wp.tumbasin.id/wp-content/uploads/2019/06/terasi-kecil-compressor.png'
    ];
}
