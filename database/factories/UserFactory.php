<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\[User]>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,   // Ensure 'firstname' is populated
            'last_name' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'father_full_name' => $this->faker->lastName,
            // 'mobile' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'dob' => $this->faker->date('Y-m-d', '2000-01-01'),
            // 'pancard' => strtoupper($this->faker->bothify('?????#####')),
            // 'adharcard' => $this->faker->numerify('############'),
            'password' => Hash::make('password'), // Default password
        ];
    }
}
