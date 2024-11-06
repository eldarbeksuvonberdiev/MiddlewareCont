<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create(['name' => 'HR']);
        Role::create(['name' => 'Accountant']);
        Role::create(['name' => 'Manager']);
        for ($i = 1; $i <= 10; $i++) {
            $user = User::create([
                'name' => 'User' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('123456')
            ]);

            $row = rand(1,3);
            for ($j=0; $j < $row ; $j++) { 
                $user->roles->attach(rand(1,3));
            }
        }





    }
}
