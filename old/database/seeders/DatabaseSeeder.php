<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed the Users table with 50 users
        \App\Models\User::factory(50)->create();

        // Call the GroupSeeder to seed the Groups table
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
    }
}
