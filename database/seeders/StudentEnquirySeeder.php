<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentEnquiry;

class StudentEnquirySeeder extends Seeder
{
    public function run()
    {
        StudentEnquiry::create([
            'user_id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'city' => 'New York',
            'course_id' => 1,
            'more_info' => 'Looking for advanced course details.',
            'status' => 1,
        ]);

        StudentEnquiry::create([
            'user_id' => 2,
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'city' => 'Los Angeles',
            'course_id' => 2,
            'more_info' => 'Would like to know about course duration.',
            'status' => 1,
        ]);
    }
}
