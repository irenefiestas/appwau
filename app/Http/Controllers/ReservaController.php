<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'cliente') {
            return redirect('/buscar')->with('error', 'Solo los clientes pueden hacer reservas');
        }

        $request->validate([
            'id_servicio' => 'required|exists:cuidador,id_cuidador',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Reserva::create([
            'id_cliente' => Auth::id(),
            'id_servicio' => $request->id_servicio,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'estado' => 'Pendiente',
        ]);

        return redirect('/buscar')->with('success', 'Reserva creada correctamente');
    }

    public function aceptar($id)
    {
        $reserva = Reserva::findOrFail($id);

        $reserva->estado = 'Confirmada';
        $reserva->save();

        return back();
    }

    public function rechazar($id)
    {
        $reserva = Reserva::findOrFail($id);

        $reserva->estado = 'Cancelada';
        $reserva->save();

        return back();
    }
}