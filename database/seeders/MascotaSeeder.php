<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mascota;

class MascotaSeeder extends Seeder
{
    public function run(): void
    {
            Mascota::firstOrCreate(
        ['user_id' => 2, 'nombre' => 'Rocky'],
        [
            'especie' => 'Perro',
            'raza' => 'Labrador',
            'tamano' => 'Grande'
        ]
    );

    Mascota::firstOrCreate(
        ['user_id' => 4, 'nombre' => 'Luna'],
        [
            'especie' => 'Gato',
            'raza' => 'Común',
            'tamano' => 'Pequeño'
        ]
    );
    }
}
