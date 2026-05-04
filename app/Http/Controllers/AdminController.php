<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy($id)
    {
        $admin = Auth::user();

        if ($admin->role !== 'admin') {
            abort(403);
        }

        $usuario = User::findOrFail($id);

        // evitar borrarte a ti mismo
        if ($usuario->id === $admin->id) {
            return back()->with('error', 'No puedes eliminarte a ti mismo');
        }

        $usuario->delete();

        return back()->with('success', 'Usuario eliminado correctamente');
    }
}