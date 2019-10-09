<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$orderNumber = orderNumber();

$factory->define(Order::class, function (Faker $faker) use ($orderNumber) {

    $orderNumber->next();
    $status = $faker->randomElement([
        0, 1, 2, 3, 4
    ]);

    return [
        'order_number' => $orderNumber->current(),
        'quantity'     => $faker->numberBetween(1, 5),
        'user_id'      => $faker->numberBetween(1, 20),
        'product_id'   => $faker->numberBetween(1, 50),
        'status'       => $status
    ];
});

/**
 * membuat nomor order yang selalu naik 1
 *
 * @return  Array
 */
function orderNumber()
{
    for ($i = 124522; $i <= 1245786622; $i++) {
        yield $i;
    }
}
