<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservaSeeder extends Seeder
{
    public function run(): void
    {Reserva::firstOrCreate(
            [
                'id_cliente' => 2,
                'id_servicio' => 1,
            ],
            [
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addHours(2),
                'estado' => 'Confirmada',
                'total_pago' => 20.00
            ]
        );
    }
}