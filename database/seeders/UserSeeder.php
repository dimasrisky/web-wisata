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
            'nama' => 'Dimas',
            'email' => 'dimas@gmail.com',
            'password' => bcrypt('dimas123'),
            'isAdmin' => 1
        ]);
        User::create([
            'nama' => 'Asep',
            'email' => 'asep@gmail.com',
            'password' => bcrypt('asep123'),
            'isAdmin' => 0
        ]);
        User::create([
            'nama' => 'Kipli',
            'email' => 'kipli@gmail.com',
            'password' => bcrypt('kipli123'),
            'isAdmin' => 0
        ]);
        User::create([
            'nama' => 'Herman',
            'email' => 'herman@gmail.com',
            'password' => bcrypt('herman123'),
            'isAdmin' => 0
        ]);
        User::create([
            'nama' => 'Surya',
            'email' => 'surya@gmail.com',
            'password' => bcrypt('surya123'),
            'isAdmin' => 1
        ]);
        User::create([
            'nama' => 'Yanto',
            'email' => 'yanto@gmail.com',
            'password' => bcrypt('yanto123'),
            'isAdmin' => 0
        ]);
    }
}
