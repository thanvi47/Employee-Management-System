<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        Department::create([
            'name'=>'IT',
            'description'=>'Information Technology',
        ]);   Department::create([
            'name'=>'Administration',
            'description'=>'Administration',
        ]);
        Department::create([
            'name'=>'HR',
            'description'=>'Human Resource',
        ]);
        Role::create([
            'name'=>'Admin',
            'description'=>'Admin',
        ]);
        Role::create([
            'name'=>'Manager',
            'description'=>'Manager',
        ]);
        Role::create([
            'name'=>'Employee',
            'description'=>'Employee',
        ]);
User::create([
    'name'=>'sadi',
    'email'=>'sadi@gmail.com',
    'password'=>bcrypt('a'),
    'department_id'=>1,
    'role_id'=>1,
    'designation'=>'CEO',
    'mobile_number'=>'01700000000',
    'address'=>'Dhaka',
    'start_form'=>'2023-01-01',
    'remember_token'=> $this->str_random(10),
]);
    }

//    private function str_random(int $int)
//    {
//    }
    private function str_random(int $int)
    {
    }
}
