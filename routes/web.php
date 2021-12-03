<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pack;
use App\Http\Controllers\PackController;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () { //Pagina principal al entrar sin previo registro.
    return view('index');
});

Route::get('/crearBoda',[UserController::class, 'index'])
    ->middleware('auth')->name('crearBoda');

// Route::get('/crearPresupuesto',[UserController::class, 'crearPresupuesto'])
//     ->middleware('auth')->name('crearPresupuesto');

//Se crea una boda
Route::post('/crearBoda',[UserController::class, 'nuevaBoda'])->middleware('auth')->name('crearBoda');
//Se crea un presupuesto
Route::post('/crearPresupuesto',[UserController::class, 'nuevoPresupuesto'])->middleware('auth')->name('crearPresupuesto');

Route::get('/crearPresupuesto', [PackController::class, 'mostrarComboFormulario'] )->middleware('auth'); //Se cargan los datos de la tabla PACK, EXTRA y PROMO

Route::get('/miBoda',[BodaController::class, 'show'])->middleware('auth')->name('miBoda');

Route::get('/editar-boda/{id}',[BodaController::class, 'edit'])->middleware('auth')->name('editarMiBoda');

Route::put('/editar-boda/{boda}',[BodaController::class, 'update'])->middleware('auth')->name('actualizarMiBoda');

Route::get('/obtener-pdf-boda/{boda}',[BodaController::class, 'obtenerPDF'])->name('obtenerPDF');


//Contacto

Route::get('/contacto',[ContactoController::class, 'index'])->middleware('auth')->name('contacto.index');

Route::post('/enviar-contacto',[ContactoController::class, 'enviarEmailContacto'])->middleware('auth')->name('contacto.enviarEmailContacto'); //Envio de contacto por email


