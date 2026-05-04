<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'especie' => 'required|in:Perro,Gato,Otro',
            'raza' => 'nullable|string|max:50',
            'tamano' => 'nullable|in:Pequeño,Mediano,Grande,Gigante',
        ]);

        Mascota::create([
            'user_id' => Auth::id(), 
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'tamano' => $request->tamano,
        ]);

        return redirect('/dashboard')->with('success', 'Mascota añadida');
    }

    public function create()
    {
        return view('mascotas.create');
    }

    public function edit(Mascota $mascota)
    {
        if ($mascota->user_id !== auth()->id()) {
            abort(403);
        }

    return view('mascotas.create', compact('mascota'));
}

    public function update(Request $request, Mascota $mascota)
    {
        if ($mascota->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'nombre' => 'required|string|max:50',
            'especie' => 'required|in:Perro,Gato,Otro',
            'raza' => 'nullable|string|max:50',
            'tamano' => 'nullable|in:Pequeño,Mediano,Grande,Gigante',
        ],[
            'nnombre.required' => 'El nombre es obligatorio',
            'especie.required' => 'La especie es obligatoria',
        ]);

        $mascota->update([
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'tamano' => $request->tamano,
        ]);

        return redirect('/dashboard')->with('success', 'Mascota actualizada');
    }
}
