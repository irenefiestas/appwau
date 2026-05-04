<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'cliente') {
            abort(403, 'No autorizado');
        }

        $request->validate([
            'puntuacion' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string'
        ]);


        Resena::create([
            'user_id' => Auth::id(),
            'puntuacion' => $request->puntuacion,
            'comentario' => $request->comentario,
            'fecha_publicacion' => now()
        ]);

        return back()->with('success', 'Reseña enviada');
    }
}
