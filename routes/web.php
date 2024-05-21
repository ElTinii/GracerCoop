<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\EmpresaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contacte', function () {
    return view('contacte');
})->name('contacte');

Route::middleware('auth')->group(function () {
Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');
});

Route::middleware('auth')->group(function () {
Route::get('/panell', function () {
    return view('vistaPanell');
})->name('panell');
});
Route::middleware('auth')->group(function () {
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/empresas', [PanelController::class, 'mostrarEmpresas'])->name('empresas');
});

Route::post('/empresas', [PanelController::class, 'store'])->name('panel.store');

Route::post('/empresas/delete/{id}', [EmpresaController::class, 'destroy'])->name('panel.destroy');

require __DIR__.'/auth.php';
