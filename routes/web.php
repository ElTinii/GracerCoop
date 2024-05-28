<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\EmpresaController;
use App\Http\Middleware\AdminMiddle;
use App\Http\Controllers\CarpetasController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Hacemos esto para que si el usuario esta logeado y se sale de la aplicacion haga la verificacion de que es un usuario o un admin i le envie a la vista correspondiente
Route::get('/redirect', function () {
    if (Auth::user()->admin) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->name('redirect');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contacte', function () {
    return view('contacte');
})->name('contacte');

Route::middleware(['auth', 'verified'])->group(function () {
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
Route::get('/panell', [PanelController::class, 'Mostrar'])->name('admin.dashboard');
});
Route::middleware('auth', 'verified')->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/empresas', [PanelController::class, 'mostrarEmpresas'])->name('empresas');
});

Route::middleware('auth', 'verified', 'admin')->group(function () {
Route::post('/empresas', [PanelController::class, 'store'])->name('panel.store');
});
Route::middleware('auth', 'verified', 'admin')->group(function () {
Route::get('/empresas/{id}', [EmpresaController::class, 'mostrarUnaEmpresa'])->name('panel.show');
});

Route::middleware('auth', 'verified', 'admin')->group(function () {
Route::post('/empresa/afegir', [EmpresaController::class, 'afegirUsuari'])->name('panel.afegir');
});

Route::middleware('auth', 'verified','admin')->group(function () {
Route::post('/empresas/delete/{id}', [EmpresaController::class, 'destroy'])->name('panel.destroy');
});

Route::get('/dades', [PanelController::class, 'obtenirDades']);
require __DIR__.'/auth.php';

Route::middleware('auth', 'verified', 'admin')->group(function () {
Route::get('/logs', [PanelController::class, 'obtenirLogs'])->name('logs');
});

Route::middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/missatges')->name('logs');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/carpetas/{id}', [CarpetasController::class, 'mostrarCarpeta'])->name('carpetas');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/carpetasEmpresa/{id}', [CarpetasController::class, 'carpetasEmpresa'])->name('carpetasEmpresa');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::post('/crearCarpeta', [CarpetasController::class, 'crearCarpetas'])->name('carpetas');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/carpetasInici/{id}', [CarpetasController::class, 'carpetasInici'])->name('carpetas');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/carpetasDelete/{id}', [CarpetasController::class, 'carpetasElim'])->name('carpetas');
});