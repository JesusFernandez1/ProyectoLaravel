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

 Route::controller(userController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('usuarios/usuarios_eliminada/{id}', 'confirmarEliminarUsuario')->name('usuarios.confirmarEliminarUsuario');
});
Route::resource('usuarios', userController::class);

Route::controller(customerController::class)->group(function(){
    Route::get('clientes/clientes_crearIncidencia', 'nuevaIncidencia')->name('clientes.nuevaIncidencia');
    Route::get('clientes/clientes_incidenciaCreada', 'crearIncidencia')->name('clientes.crearIncidencia');
    Route::get('clientes/clientes_eliminado/{id}', 'confirmarEliminarCliente')->name('clientes.confirmarEliminarCliente');
});
Route::resource('clientes', customerController::class);

Route::controller(feeController::class)->group(function(){
    Route::get('cuotas/cuotas_crear/{id}', 'agregar')->name('cuotas.agregar');
    Route::get('cuotas/cuotas_eliminada/{id}', 'confirmarEliminarCuota')->name('cuotas.confirmarEliminarCuota');
});
Route::resource('cuotas', feeController::class);

Route::controller(taskController::class)->group(function(){
    Route::get('tareas/tareas_verInformacionDetallada', 'verInformacionDetallada')->name('tareas.verInformacionDetallada');
    Route::get('tareas/tareas_pendientes', 'verTareasPendientes')->name('tareas.verTareasPendientes');
    Route::get('tareas/tareas_eliminada/{id}', 'confirmarBorrarTarea')->name('tareas.confirmarBorrarTarea');
    Route::get('tareas/tareas_completar/{id}', 'completarTarea')->name('tareas.completarTarea');
});
Route::resource('tareas', taskController::class);
