<?php

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        return [
            'name'=> $faker->vehicle,
            'price' => $faker->numberBetween(99, 450),
            'description' => $faker->text(50).' '.$faker->vehicleType.' '.$faker->vehicleFuelType.' '.$faker->vehicleGearBoxType,
            'image' => "default.png",
            //
        ];
});
