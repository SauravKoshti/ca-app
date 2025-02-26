<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'user_full_name' => fn ($attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'pincode' => $this->faker->numerify('######'),
            'aadhar_card' => $this->faker->numerify('####-####-####'),
            'pan_card' => strtoupper($this->faker->bothify('?????####?')),
            'company_name' => $this->faker->company,
            'profile_image' => $this->faker->imageUrl(200, 200, 'people'),
            'email' => $this->faker->unique()->safeEmail,
            'gst_number' => strtoupper($this->faker->bothify('##????####?####')),
            'anniversary_date' => $this->faker->optional()->date(),
            'mobile' => $this->faker->unique()->numerify('##########'),
            'gender' => $this->faker->boolean(),
            'dob' => $this->faker->date(),
            'password' => bcrypt('password'), // Default password
            'father_full_name' => $this->faker->name,
            'user_type' => $this->faker->randomElement(['gst', 'personal', 'admin']),
            // 'group_id' => $this->faker->numberBetween(1, 10),
            'refer' => $this->faker->optional()->userName,
            // 'remember_token' => Str::random(10),
        ];
    }
}

