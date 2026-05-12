<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;

class ServicioSeeder extends Seeder
{
    public function run(): void
    {
        Servicio::updateOrCreate(
            [
                'id_cuidador' => 1,
                'tipo_servicio' => 'Paseo de perros'
            ],
            [
                'precio_base' => 10.00
            ]
        );

        Servicio::updateOrCreate(
            [
                'id_cuidador' => 2,
                'tipo_servicio' => 'Cuidado en casa'
            ],
            [
                'precio_base' => 15.00
            ]
        );
    }
}