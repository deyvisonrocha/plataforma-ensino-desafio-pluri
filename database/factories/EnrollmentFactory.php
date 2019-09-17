<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enrollment;
use Faker\Generator as Faker;

$factory->define(Enrollment::class, function (Faker $faker) {
    return [
        'course_id' => \App\Course::get()->random()->id,
        'student_id' => \App\Student::get()->random()->id,
    ];
});
