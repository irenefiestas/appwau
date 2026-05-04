<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@appwau.com',
                'password' => Hash::make('Admin1234'),
                'role' => 'admin'
            ],
            [
                'name' => 'Ana Lopez',
                'email' => 'ana@mail.com',
                'password' => Hash::make('123456Al'),
                'role' => 'cliente'
            ],
            [
                'name' => 'Luis Perez',
                'email' => 'luis@mail.com',
                'password' => Hash::make('123456Lp'),
                'role' => 'cuidador'
            ],
            [
                'name' => 'Maria Ruiz',
                'email' => 'maria@mail.com',
                'password' => Hash::make('123456Mr'),
                'role' => 'cliente'
            ],
            [
                'name' => 'Carlos Diaz',
                'email' => 'carlos@mail.com',
                'password' => Hash::make('123456Cd'),
                'role' => 'cuidador'
            ]
        ]);
    }
}