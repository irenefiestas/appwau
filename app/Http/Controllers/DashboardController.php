<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserva;
use App\Models\Cuidador;
use App\Models\User;
use App\Models\Mascota;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 

        if ($user->role === 'cliente') {

            $reservas = Reserva::where('id_cliente', $user->id)->get();
            $mascotas = $user->mascotas;
            return view('dashboard.cliente', compact('reservas', 'mascotas'));
        }

        if ($user->role === 'cuidador') {

            $cuidador = Cuidador::where('user_id', $user->id)->first();
            $reservas = Reserva::where('id_servicio', $cuidador->id_cuidador)->get();
            return view('dashboard.cuidador', compact('reservas', 'cuidador'));
        }

        if ($user->role === 'admin') {

            $usuarios = User::all();
            $totalUsuarios = User::count();
            $totalMascotas = Mascota::count();
            $totalReservas = Reserva::count();

            return view('dashboard.admin', compact(
                'usuarios',
                'totalUsuarios',
                'totalMascotas',
                'totalReservas'
            ));
        }

        abort(403);
    }
}