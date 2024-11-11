<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Category;
use App\Models\Home;
use App\Models\Hospital;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\Role;
use App\Models\Stadium;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

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



        for ($i=0; $i < 10; $i++) { 
            Car::create([
                'name' => 'Car'.$i,
                'model' => 'Model'.$i,
                'color' => fake()->colorName()
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Category::create([
                'name' => 'Category'.$i
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Home::create([
                'name' => 'Home'.$i,
                'address' => fake()->address(),
                'home_number' => rand(1,1000)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Hospital::create([
                'name' => 'Hospital'.$i,
                'address' => fake()->address(),
                'capacity' => rand(1000000,1516516)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Stadium::create([
                'name' => 'Stadium'.$i,
                'address' => fake()->address(),
                'capacity' => rand(1000000,1516516)
            ]);
        }

        for ($i=0; $i < 10; $i++) { 
            Student::create([
                'full_name' => 'Student'.$i,
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email()
            ]);
        }

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'car']);
        $role3 = Role::create(['name' => 'category']);
        $role4 = Role::create(['name' => 'home']);
        $role5 = Role::create(['name' => 'hospital']);
        $role6 = Role::create(['name' => 'stadium']);
        $role7 = Role::create(['name' => 'student']);

        for ($i = 1; $i <= 15; $i++) {
            $user = User::create([
                'name' => 'User' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => Hash::make('123456')
            ]);

            $row = rand(1,6);
            for ($j=0; $j < $row ; $j++) { 
                $user->roles()->attach(rand(1,6));
            }
        }

        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            $key = $route->getName();

            
            if ($key && !str_starts_with($key,'generated') && $key !== 'storage.local') {
                $key1 = $key;
                $groupName = explode('.',$key1)[0];
                $group = PermissionGroup::firstOrCreate(['name'=> $groupName]);
                $name = ucfirst(str_replace('.','-',$key));
                Permission::create([
                    'key' => $key,
                    'name' => $name,
                    'permission_group_id' => $group->id
                ]);
            }
        }

        $permissions = Permission::pluck('id')->toArray();

        $role1->permissions()->attach($permissions);
        $role2->permissions()->attach($permissions);
        $role3->permissions()->attach($permissions);
        $role4->permissions()->attach($permissions);
        $role5->permissions()->attach($permissions);
        $role6->permissions()->attach($permissions);
        $role7->permissions()->attach($permissions);
    }
}
