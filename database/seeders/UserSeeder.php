<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'kevin adi',
            'email' => 'kevinadi@gmail.com',
            'password' => bcrypt('kev123'),
            'phone' => '08123546565',
            'address' => 'jl. sroyo iindah',
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'Deni',
            'email' => 'denii@gmail.com',
            'password' => bcrypt('deni12'),
            'phone' => '082132324545',
            'address' => 'jl. nologaten no 10',
            'role' => 'instructor',
        ]);

        User::create([
            'username' => 'Jati',
            'email' => 'jat123@gmail.com',
            'password' => bcrypt('jatt123'),
            'phone' => '082534768787',
            'address' => 'jl. danupayan permai',
            'role' => 'kasir',
        ]);

        User::create([
            'username' => 'Dafa',
            'email' => 'dafa@gmail.com',
            'password' => bcrypt('daf432123'),
            'phone' => '082534768787',
            'address' => 'jl. danupayan permai',
            'role' => 'member',
        ]);

        User::create([
            'username' => 'Tegar',
            'email' => 'tegar0@gmail.com',
            'password' => bcrypt('gar123'),
            'phone' => '082534768787',
            'address' => 'jl. permai indah',
            'role' => 'mo',
        ]);
    }
}
