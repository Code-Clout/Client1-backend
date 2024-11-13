<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RegistrationStudent;

class RegistrationStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch an existing user
        $user = User::first();

        // Ensure a user exists
        if (!$user) {
            
            $user = User::create([
                'name' => 'Default User',
                'email' => 'default@example.com',
                'phone' => '1234567890',
                'status' => 1,
                'role_type' => 1,
                'password' => bcrypt('password'),
            ]);
        }

        // Create a registration student entry
        RegistrationStudent::create([
            'user_id' => $user->id,
            'father_name' => 'Robert Doe',
            'mother_name' => 'Mary Doe',
            'last_name' => 'Doe',
            'home_no' => '1234',
            'DOB' => '2000-01-01',
            'gender' => 'Male',
            'nationality' => 'American',
            'street_address' => '123 Main St',
            'city' => 'New York',
            'pin_code' => '10001',
            'reason' => 'Enrollment for 2024',
            'status' => 1,
        ]);
    }
}
