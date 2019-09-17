<?php

use Illuminate\Database\Seeder;

class EnrollmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Enrollment::class, 30)->create();
    }
}
