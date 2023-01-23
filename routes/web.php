<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\feeController;

/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('usuarios', userController::class);
Route::resource('tareas', taskController::class);
Route::resource('clientes', customerController::class);
Route::resource('cuotas', feeController::class);

 Route::controller(userController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('usuarios/usuarios_eliminar/{id}', 'eliminarUsuario')->name('usuarios.eliminarUsuario');
});

Route::controller(customerController::class)->group(function(){
    Route::get('clientes/clientes_eliminar/{id}', 'eliminarCliente')->name('clientes.eliminarCliente');
});

Route::controller(feeController::class)->group(function(){
    Route::get('cuotas/cuotas_eliminar/{id}', 'eliminarCuota')->name('cuotas.eliminarCuota');
});

Route::controller(taskController::class)->group(function(){
    Route::get('tareas/tareas_eliminar/{id}', 'borrarTarea')->name('tareas.borrarTarea');
    Route::get('tareas/tareas_completar', 'completarTarea')->name('tareas.completarTarea');
    Route::get('tareas/tareas_mostrar_completa', 'verTareasCompletas')->name('tareas.verTareasCompletas');
    Route::get('tareas/tareas_pendientes', 'verTareasPendientes')->name('tareas.verTareasPendientes');
});

