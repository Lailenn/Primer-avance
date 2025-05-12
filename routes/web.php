<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Objeto;
use App\Http\Controllers\ReporteController;


// Ruta para la página de bienvenida (antes de iniciar sesión)
Route::get('/', function () {
    return view('welcome');
});

// Ruta para la página principal después del login (Home)
Route::get('/home', function () {
    return view('home'); // Se redirige al home después de iniciar sesión
})->middleware(['auth'])->name('home');

// Ruta de perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';

// Redirigir a home en lugar de dashboard
Route::get('/dashboard', function () {
    return redirect()->route('home'); // Redirige a home en lugar de dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reportar', function () {
    return view('reportar');
})->name('reportar');

use App\Http\Controllers\ReportarController;

Route::post('/reportar-objeto', [ReportarController::class, 'store']);

Route::get('/objetos', function () {
    return response()->json(Objeto::all());
});

Route::get('/reportar-objeto', [ReportarController::class, 'reportarObjeto'])->name('reportar-objeto');

use App\Models\ListaDeObjeto;

Route::get('/objetos', function () {
    return response()->json(ListaDeObjeto::all());
});
