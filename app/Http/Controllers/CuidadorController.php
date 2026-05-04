<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cuidador;

class CuidadorController extends Controller
{
    public function index()
    {
        $cuidadores = Cuidador::all();

        return view('buscar', compact('cuidadores'));
    }

    public function create()
    {
        return view('cuidador.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'biografia' => 'required|string|max:500',
            'ciudad' => 'required|string|max:100',
            'precio_hora' => 'required|numeric|min:1|max:100',
        ], [
            'biografia.required' => 'La biografía es obligatoria',
            'ciudad.required' => 'La ciudad es obligatoria',
            'precio_hora.required' => 'El precio es obligatorio',
            'precio_hora.numeric' => 'El precio debe ser un número',
        ]);

        $user = Auth::user();

        // evitar duplicados
        if ($user->role === 'cuidador') {
            return redirect('/dashboard')->with('error', 'Ya eres cuidador');
        }

        // crear cuidador
        Cuidador::create([
            'user_id' => $user->id,
            'biografia' => $request->biografia,
            'ciudad' => $request->ciudad,
            'precio_hora' => $request->precio_hora,
            'paseo' => $request->has('paseo'),
            'guarderia' => $request->has('guarderia'),
            'cuidado_domicilio' => $request->has('cuidado_domicilio'),
            'ranking_promedio' => 0,
            'verificado' => false,
        ]);

        // cambiar rol
        $user->role = 'cuidador';
        $user->save();

        return redirect('/buscar')->with('success', 'Ahora eres cuidador 🎉');
    }
}

