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
use App\Http\Controllers\rendaController;
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


Route::get('/contacte', function () {
    return view('contacte');
})->name('contacte');


Route::get('/dades', [PanelController::class, 'obtenirDades']);
require __DIR__.'/auth.php';

//Aqui ponemos las rutas que necesitan estar verificadas con la session iniciada y ser administrador
Route::middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/empresas', [PanelController::class, 'mostrarEmpresas'])->name('empresas');
    Route::post('/empresas', [PanelController::class, 'store'])->name('panel.store');
    Route::post('/empresas/delete/{id}', [EmpresaController::class, 'destroy'])->name('panel.destroy');
    Route::post('/empresa/afegir', [EmpresaController::class, 'afegirUsuari']);
    Route::get('/empresas/{id}', [EmpresaController::class, 'mostrarUnaEmpresa'])->name('panel.show');
    Route::get('/logs', [PanelController::class, 'obtenirLogs'])->name('logs');
    Route::get('log/{id}', [PanelController::class, 'infoLog'])->name('log');
    Route::get('/missatges')->name('logs');
    Route::get('/panell', [PanelController::class, 'Mostrar'])->name('admin.dashboard');
    Route::get('/eliminarUsuari/{id}', [EmpresaController::class, 'eliminarUsuari'])->name('eliminarUsuari');
    Route::get('/rendaMod', [rendaController::class, 'mostrarRenda'])->name('rendaMod');
    Route::post('/editarRenda', [rendaController::class, 'editarRenda'])->name('editarRenda');
});

//Aqui ponemos las rutas que necesitan estar verificadas con la session iniciada
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/carpetas/{id}', [CarpetasController::class, 'mostrarCarpeta'])->name('carpetasMostrar');
    Route::get('/carpetasEmpresa/{id}', [CarpetasController::class, 'carpetasEmpresa'])->name('carpetasEmpresa');
    Route::post('/crearCarpeta', [CarpetasController::class, 'crearCarpetas'])->name('crearCarpetas');
    Route::get('/carpetasInici/{id}', [CarpetasController::class, 'carpetasInici'])->name('carpetas');
    Route::get('/carpetasDelete/{id}', [CarpetasController::class, 'carpetasElim'])->name('carpetas');
    Route::post('/pujarFitxers', [CarpetasController::class, 'pujarFitxers'])->name('fitxerCarpetas');
    Route::get('/eliminarArxiu/{id}', [CarpetasController::class, 'eliminarArxiu'])->name('eliminarArxiu');
    Route::get('/descargarArchivo', [CarpetasController::class, 'descargar']);
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
});

//Aqui ponemos las rutas que no necesitan estar verificadas con la session iniciada ya que son las vistas de anonimo
Route::view('/quienes-somos', 'QuiSom')->name('quienes-somos');
Route::view('/que-hacemos', 'QueFem')->name('que-hacemos');
Route::view('/como-lo-hacemos', 'ComHoFem')->name('como-lo-hacemos');
Route::view('/subvenciones', 'subvencions')->name('subvenciones');
Route::view('/renda', 'renda')->name('renda');
Route::view('/clientes', 'Clients')->name('clientes');
Route::view('/noticias', 'noticias')->name('noticias');
Route::view('/contacto', 'contacte')->name('contacto');
Route::view('/indexEs', 'espanyol.index')->name('indexEs');
Route::view('/contactoRenda', 'formulari')->name('contactoRenda');

Route::view('/subvencionesEs', 'espanyol.subvencions')->name('subvencionesEs');
Route::view('/rentaEs', 'espanyol.renda')->name('rentaEs');
Route::view('/clientsEs', 'espanyol.contacto')->name('clientsEs');
Route::view('/contactoRendaEs', 'espanyol.formulari_contacto')->name('contactoRendaEs');