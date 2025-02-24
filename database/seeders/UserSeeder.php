<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Carbon\Carbon;


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
        $faker = Faker::create();

        $today = Carbon::now()->format('Y-m-d');

$users = [];

for ($i = 0; $i < 10; $i++) {
    $users[] = [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->userName,
        'user_type' => $faker->randomElement(['gst', 'personal', 'admin']),
        'mobile' => $faker->unique()->numerify('##########'),
        'email' => 'sauravkoshti2000@gmail.com',
        'dob' => $i < 5 ? $today : $faker->date, // First 5 users have birthday today
        'password' => Hash::make('password'),
        'father_full_name' => $faker->name,
        'address' => $faker->address,
        'city' => $faker->city,
        'pincode' => $faker->unique()->numerify('######'),
        'aadhar_card' => $faker->unique()->numerify('############'),
        'pan_card' => strtoupper($faker->unique()->bothify('?????####?')),
        'gst_number' => $faker->optional()->bothify('##?????####?###'),
        'anniversary_date' => $i >= 5 ? $today : null, // Last 5 users have anniversary today
        'gender' => $faker->boolean,
        'role' => 'user',
        'created_at' => now(),
        'updated_at' => now(),
    ];
}

// User::create([
//     'first_name' => 'admin',
//     'last_name' => 'admin',
//     'username' => 'admin',
//     'user_type' => 'admin',
//     'mobile' => '1234567890',
//     'email' => 'admin@admin.com',
//     'dob' => '1990-01-01',
//     'password' => Hash::make('admin'),
//     'father_full_name' => 'Admin Father',
//     'name' => 'Admin Name',
//     'address' => '123 Admin Street, Admin City',
//     'city' => 'Admin City',
//     'pincode' => '123456',
//     'aadhar_card' => '123456789012',
//     'pan_card' => 'ABCDE1234F',
//     'gst_number' => null, // Optional
//     'anniversary_date' => null, // Optional
//     'gender' => 1, // 1 for Male, 0 for Female
//     'role' => 'admin',
//     'created_at' => now(),
//     'updated_at' => now(),
// ]);

}
}
