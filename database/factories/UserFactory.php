<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->unique()->username,
            'user_type' => $this->faker->randomElement(['business', 'private', 'admin']),
            'mobile' => $this->faker->unique()->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail,
            'dob' => $this->faker->date,
            'password' => Hash::make('password'),
            'father_full_name' => $this->faker->name,
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'pincode' => $this->faker->unique()->numerify('######'),
            'aadhar_card' => $this->faker->unique()->numerify('############'), 
            'pan_card' => strtoupper($this->faker->unique()->bothify('?????####?')), 
            'gst_number' => $this->faker->optional()->bothify('##?????####?###'),
            'anniversary_date' => $this->faker->optional()->date,
            'gender' => $this->faker->boolean, 
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
