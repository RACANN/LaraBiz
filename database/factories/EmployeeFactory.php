<?php

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'ssn' => $faker->randomNumber(),

        'pay' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20),
        'employee_number' => $faker->randomNumber(),
        'position' => $faker->word,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->randomNumber(),
        'birth_date' => $faker->dateTime(),
        'hire_date' => $faker->dateTime()
    ];
});
