<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        echo "Seeder started...\n";
        try {
            \App\Models\User::factory(10)->create();

            \App\Models\User::factory()->create([
                'name' => 'Benjamin',
                'email' => 'dedardel@email.me',
                'password' => bcrypt('password'),
                'mobile' => rand(10000000, 99999999),
                'role' => 'coach'
            ]);

            \App\Models\User::factory()->create([
                'name' => 'jason',
                'email' => 'jissang@email.me',
                'password' => bcrypt('password'),
                'mobile' => rand(10000000, 99999999),
            ]);

            echo "Seeder completed successfully.\n";
        } catch (\Exception $e) {
            echo "Error in seeder: " . $e->getMessage() . "\n";
        }
    }
}
