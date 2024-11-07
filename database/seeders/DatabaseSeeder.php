<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Category;
use App\Models\Home;
use App\Models\Hospital;
use App\Models\Role;
use App\Models\Stadium;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

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

        // Role::create(['name' => 'HR']);
        // Role::create(['name' => 'Accountant']);
        // Role::create(['name' => 'Manager']);
        // for ($i = 1; $i <= 10; $i++) {
        //     $user = User::create([
        //         'name' => 'User' . $i,
        //         'email' => 'user' . $i . '@gmail.com',
        //         'password' => Hash::make('123456')
        //     ]);

        //     $row = rand(1,3);
        //     for ($j=0; $j < $row ; $j++) { 
        //         $user->roles->attach(rand(1,3));
        //     }
        // }

        for ($i=0; $i < 100; $i++) { 
            Car::create([
                'name' => 'Car'.$i,
                'model' => 'Model'.$i,
                'color' => fake()->colorName()
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Category::create([
                'name' => 'Category'.$i
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Home::create([
                'name' => 'Home'.$i,
                'address' => fake()->address(),
                'home_number' => rand(1,1000)
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Hospital::create([
                'name' => 'Hospital'.$i,
                'address' => fake()->address(),
                'capacity' => rand(1000000,1516516)
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Stadium::create([
                'name' => 'Stadium'.$i,
                'address' => fake()->address(),
                'capacity' => rand(1000000,1516516)
            ]);
        }

        for ($i=0; $i < 100; $i++) { 
            Student::create([
                'full_name' => 'Student'.$i,
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email()
            ]);
        }




    }
}
