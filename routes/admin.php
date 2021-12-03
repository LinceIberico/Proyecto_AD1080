<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\admin\AdminUsuarioController;
use App\Http\Controllers\admin\AdminPackController;
use App\Http\Controllers\admin\AdminExtraController;
use App\Http\Controllers\Admin\AdminPromocionController;
use App\Http\Controllers\admin\AdminBodaController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\AdminPresupuestoController;
use App\Http\Controllers\admin\AdminEmpleadoController;
use App\Http\Controllers\admin\AdminMailController;


// Route::middleware(['comprobar.admin'])->get('/cms', function () { //Aqui comprobamos que el usuario registrado es admin o no. 
//     return view('admin.cms');
//     })->name('cms');

// Route::middleware(['comprobar.admin'])->get('/cms', function () { 
//     return view('admin.cms');
//     })->name('cms');

Route::middleware(['auth', 'comprobar.admin'])->group(function () {

    Route::get('/cms', [AdminController::class, 'index'])->name('admin.index');

    //USUARIOS
    
    Route::get('/nuevo-usuario', [AdminUserController::class, 'index'])->name('admin.nuevoUsuario');
    
    Route::post('/nuevo-usuario', [AdminUserController::class, 'store'])->name('admin.nuevoUsuario.store');
    
    Route::get('/editar-usuario/{user}', [AdminUsuarioController::class, 'edit'])->name('admin.usuario.edit');
    
    Route::put('/editar-usuario/{user}', [AdminUsuarioController::class, 'update'])->name('admin.usuario.update');
    
    
    Route::get('/usuarios',[AdminUsuarioController::class, 'index'])->name('usuarios');

    //EMPLEADOS
  
    Route::get('/empleados',[AdminEmpleadoController::class, 'index'])->name('admin.empleados');

    Route::post('/enviarMailBodaEmpleado',[AdminMailController::class, 'enviarMailBodaEmpleado'])->name('admin.enviarMailBodaEmpleado');
    Route::get('/mostrarMailBodaEmpleado',[AdminMailController::class, 'enviarMailBodaEmpleado'])->name('admin.mostrarMailBodaEmpleado');
 
    //BODAS
    
    Route::get('/bodas',[AdminBodaController::class, 'index'])->name('bodas.index');
    
    Route::get('/boda/{boda}',[AdminBodaController::class, 'show'])->name('bodas.show');
    
    Route::get('/crear-boda',[AdminBodaController::class, 'create'])->name('bodas.create');
    
    Route::get('/editar-boda/{boda}',[AdminBodaController::class, 'edit'])->name('bodas.edit');
    
    Route::post('/guardar-boda',[AdminBodaController::class, 'store'])->name('bodas.store');
    
    Route::put('/editar-boda/{boda}',[AdminBodaController::class, 'update'])->name('bodas.update');
    
    Route::get('/obtener-pdf-boda/{boda}',[AdminBodaController::class, 'obtenerPDF'])->name('bodas.obtenerPDF');
    
    //PRESUPUESTOS
    
    Route::get('/presupuestos',[AdminPresupuestoController::class, 'index'])->name('presupuestos.index');
    
    Route::get('/presupuestos/{presupuesto}',[AdminPresupuestoController::class, 'show'])->name('presupuestos.show');

    Route::get('/crear-presupuesto',[AdminPresupuestoController::class, 'create'])->name('presupuestos.create');
    
    Route::post('/guardar-presupuesto',[AdminPresupuestoController::class, 'store'])->name('presupuestos.store');

    Route::get('/editar-presupuestos/{presupuesto}',[AdminPresupuestoController::class, 'edit'])->name('presupuestos.edit');
    
    Route::put('/editar-presupuestos/{presupuesto}',[AdminPresupuestoController::class, 'update'])->name('presupuestos.update');
    
    Route::get('/obtener-pdf-presupuesto/{presupuesto}',[AdminPresupuestoController::class, 'obtenerPDF'])->name('presupuestos.obtenerPDF');    
    
    //PACKS
    
    Route::get('/packs',[AdminPackController::class, 'index'])->name('packs.index');
    
    Route::get('/crear-pack',[AdminPackController::class, 'create'])->name('packs.create');
    
    Route::get('/editar-pack/{pack}',[AdminPackController::class, 'edit'])->name('packs.edit');
    
    Route::post('/guardar-pack',[AdminPackController::class, 'store'])->name('packs.store');
    
    Route::put('/editar-pack/{pack}',[AdminPackController::class, 'update'])->name('packs.update');
    
    //EXTRAS
    
    Route::get('/extras',[AdminExtraController::class, 'index'])->name('extras.index');
    
    Route::get('/crear-extras',[AdminExtraController::class, 'create'])->name('extras.create');
    
    Route::post('/guardar-extras',[AdminExtraController::class, 'store'])->name('extras.store');
    
    Route::get('/extras/{extra}', [AdminExtraController::class, 'edit'])->name('extras.edit');
    
    Route::put('/extras/{extra}',[AdminExtraController::class, 'update'])->name('extras.update');
    
    //PROMOCIONES
    
    Route::get('/promociones',[AdminPromocionController::class, 'index'])->name('promociones.index');
    
    Route::get('/crear-promociones',[AdminPromocionController::class, 'create'])->name('admin.promocion.create');
    
    Route::post('/guardar-promociones',[AdminPromocionController::class, 'store'])->name('admin.promocion.store');
    
    Route::get('/editar-promociones/{promo}',[AdminPromocionController::class, 'edit'])->name('admin.promocion.edit');
    
    Route::put('/editar-promociones/{promo}', [AdminPromocionController::class, 'update'])->name('admin.promocion.update');
});

