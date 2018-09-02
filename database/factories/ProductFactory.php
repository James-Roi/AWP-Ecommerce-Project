<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //$faker->randomDigitNotNull
        'category_id' => '1',//set to 1 for now
        'name' => $faker->text(20),
        'description' => $faker->text(50),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99999.00),
        'image' => $faker->text(20)
    ];
});
