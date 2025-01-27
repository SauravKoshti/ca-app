<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName,   // Ensure 'firstname' is populated
            'lastname' => $this->faker->lastName,
            'username' => $this->faker->unique()->userName,
            'mobile' => $this->faker->unique()->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'dob' => $this->faker->date('Y-m-d', '2000-01-01'),
            'pancard' => strtoupper($this->faker->bothify('?????#####')),
            'adharcard' => $this->faker->numerify('############'),
            'password' => Hash::make('password'), // Default password
        ];
    }
}
