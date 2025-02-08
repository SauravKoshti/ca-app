<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'father_full_name' => $this->faker->name('male'),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            // 'pincode' => $this->faker->postcode('[0-9]{6}'),
            'aadhaar_card' => $this->faker->unique()->numerify('####-####-####'),
            'pan_card' => $this->faker->unique()->bothify('?????####?'),
            'email' => $this->faker->unique()->safeEmail(),
            'gst_number' => $this->faker->optional()->regexify('[0-9A-Z]{15}'), // Optional GST Number
            'anniversary_date' => $this->faker->optional()->date(),
            'mobile' => $this->faker->unique()->numerify('##########'),
            'dob' => $this->faker->date(),
            'user_type' => $this->faker->randomElement(['business', 'private', 'admin']),
            'role' => 'user', // Default role
            'password' => Hash::make('password'), // Default password
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
