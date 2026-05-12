<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\CuidadorController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Artisan;

use App\Models\Resena;


Route::get('/', function () {
    return view('welcome', ['resenas' => []]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/usuarios', [UsuarioController::class, 'index']); 

Route::get('/buscar', [CuidadorController::class, 'index'])->name('buscar');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/mascotas/create', [MascotaController::class, 'create'])->name('mascotas.create');

Route::get('/mascotas/{mascota}/edit', [MascotaController::class, 'edit'])->name('mascotas.edit');

Route::delete('/admin/usuarios/{id}', [AdminController::class, 'destroy'])
    ->name('admin.usuarios.destroy')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/mis-reservas', [ReservaController::class, 'index'])->name('reservas.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/resenas', [ResenaController::class, 'store'])->name('resenas.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/convertirse-cuidador', [CuidadorController::class, 'create']);
    Route::post('/convertirse-cuidador', [CuidadorController::class, 'store']);
});

Route::post('/reservas/{id}/aceptar', [ReservaController::class, 'aceptar'])
    ->name('reservas.aceptar');

Route::post('/reservas/{id}/rechazar', [ReservaController::class, 'rechazar'])
    ->name('reservas.rechazar');

Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');

Route::put('/mascotas/{mascota}', [MascotaController::class, 'update'])->name('mascotas.update');

require __DIR__.'/auth.php';
