<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'email' => $faker->companyEmail,
        'gender' => rand(0, 1) ? 'male' : 'female',
        'birthday' => $faker->dateTimeBetween('-35 years', '-10 years')
    ];
});
