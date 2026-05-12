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
    User::firstOrCreate(
        ['email' => 'admin@appwau.com'],
        [
            'name' => 'Admin',
            'password' => Hash::make('Admin1234'),
            'role' => 'admin'
        ]
    );

    User::firstOrCreate(
        ['email' => 'ana@mail.com'],
        [
            'name' => 'Ana Lopez',
            'password' => Hash::make('123456Al'),
            'role' => 'cliente'
        ]
    );

    User::firstOrCreate(
        ['email' => 'luis@mail.com'],
        [
            'name' => 'Luis Perez',
            'password' => Hash::make('123456Lp'),
            'role' => 'cuidador'
        ]
    );

    User::firstOrCreate(
        ['email' => 'maria@mail.com'],
        [
            'name' => 'Maria Ruiz',
            'password' => Hash::make('123456Mr'),
            'role' => 'cliente'
        ]
    );

    User::firstOrCreate(
        ['email' => 'carlos@mail.com'],
        [
            'name' => 'Carlos Diaz',
            'password' => Hash::make('123456Cd'),
            'role' => 'cuidador'
        ]
    );
}
}