<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        echo "Seeder started...\n";
        try {
            \App\Models\User::factory(10)->create();
            echo "Seeder completed successfully.\n";
        } catch (\Exception $e) {
            echo "Error in seeder: " . $e->getMessage() . "\n";
        }
        echo "Seeder started...\n";
        try {
           DB::table('users')->insert([
                'name' => 'Benjamin',
                'email' => 'dedardel@email.me',
                'password' => bcrypt('password'),
                'telephone' => rand(10000000, 99999999),
                'role' => 'coach'
            ]);
            DB::table('users')->insert([
                'name' => 'jason',
                'email' => 'jissang@email.me',
                'password' => bcrypt('password'),
                'telephone' => rand(10000000, 99999999),
            ]);

            echo "Seeder completed successfully.\n";
        } catch (\Exception $e) {
            echo "Error in seeder: " . $e->getMessage() . "\n";
        }
    }
    

}
