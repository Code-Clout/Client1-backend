<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'course_name' => 'Computer Science',
            'course_price' => 1500.00,
            'status' => 1,
        ]);

        Course::create([
            'course_name' => 'Mathematics',
            'course_price' => 1200.00,
            'status' => 1,
        ]);
    }
}
