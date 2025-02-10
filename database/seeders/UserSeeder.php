<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed 50 users using UserFactory
        User::factory(50)->create();

        // Alternatively, you can manually create users like this:
        /*
        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'username' => 'johndoe',
            'mobile' => '1234567890',
            'email' => 'john.doe@example.com',
            'dob' => '1990-01-01',
            'pancard' => 'ABCDE1234F',
            'adharcard' => '123456789012',
            'password' => Hash::make('password')
        ]);*/

User::create([
    'first_name' => 'admin',
    'last_name' => 'admin',
    'username' => 'admin',
    'user_type' => 'admin',
    'mobile' => '1234567890',
    'email' => 'admin@admin.com',
    'dob' => '1990-01-01',
    'password' => Hash::make('admin'),
    'father_full_name' => 'Admin Father',
    'name' => 'Admin Name',
    'address' => '123 Admin Street, Admin City',
    'city' => 'Admin City',
    'pincode' => '123456',
    'aadhar_card' => '123456789012',
    'pan_card' => 'ABCDE1234F',
    'gst_number' => null, // Optional
    'anniversary_date' => null, // Optional
    'gender' => 1, // 1 for Male, 0 for Female
    'role' => 'admin',
    'created_at' => now(),
    'updated_at' => now(),
]);

}
}
