<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //
        'orderNo'=>$faker->uuid,
        'total'=>$faker->randomFloat(2,9.99,999.99)

    ];
});
