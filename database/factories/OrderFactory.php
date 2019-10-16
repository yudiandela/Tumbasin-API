<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\Product;
use Faker\Generator as Faker;

$orderNumber = orderNumber();

$factory->define(Order::class, function (Faker $faker) use ($orderNumber) {

    $orderNumber->next();
    $status = $faker->randomElement([
        0, 1, 2, 3, 4
    ]);
    $quantity = $faker->numberBetween(1, 5);
    $product_id = $faker->numberBetween(1, 50);
    $product = Product::select('price')->where('id', $product_id)->first();

    return [
        'order_number' => $orderNumber->current(),
        'quantity'     => $quantity,
        'user_id'      => $faker->numberBetween(1, 20),
        'product_id'   => $product_id,
        'status'       => $status,
        'total'        => $quantity * $product->price
    ];
});

/**
 * membuat nomor order yang selalu naik 1
 *
 * @return  Array
 */
function orderNumber()
{
    for ($i = time(); $i <= time() + 100; $i++) {
        yield $i;
    }
}
