<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class equipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Seeder started...\n";
        try {
            \App\Models\equipe::factory(10)->create();

            echo "Seeder completed successfully.\n";
        } catch (\Exception $e) {
            echo "Error in seeder: " . $e->getMessage() . "\n";
        }
    }
}
