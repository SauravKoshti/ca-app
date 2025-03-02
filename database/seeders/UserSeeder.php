<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 random users
        User::factory()->count(10)->create();

        // Create a specific admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin123',
            'user_full_name' => 'Admin User',
            'father_full_name' => '',
            'address' => '',
            'city' => '',
            'pincode' => '',
            'aadhar_card' => '',
            'pan_card' => '',
            'company_name' => '',
            'profile_image' => '',
            'gst_number' => '',
            'anniversary_date' => '',
            'mobile' => '',
            'gender' => 1,
            'dob' => '',
            'refer' => '',
            'email' => 'admin@example.com',
            'user_type' => 'admin',
            'password' => bcrypt('admin123')
        ]);
    }
}
