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
/**
Route::controller(userController::class)->group(function(){
    Route::get('/', 'verUsuarios');
    Route::get('usuarios/usuarios_crear', 'crearUsuario');
    Route::post('usuarios/usuarios_crear', 'crearUsuario');
    Route::get('usuarios/usuarios_modificar/{id}', 'modificarUsuario');
    Route::post('usuarios/usuarios_modificar/{id}', 'modificarUsuario');
    Route::get('usuarios/usuarios_eliminar/{id}', 'eliminarUsuario');
    Route::post('usuarios/usuarios_eliminar/{id}', 'eliminarUsuario');
});

Route::controller(taskController::class)->group(function(){
    Route::get('tareas/tareas_mostrar', 'verTareas');
    Route::get('tareas/tareas_crear', 'crearTarea');
    Route::get('tareas/tareas_modificar/{id}', 'modificarTarea');
    Route::get('tareas/tareas_eliminar/{id}', 'borrarTarea');
    Route::get('tareas/tareas_completar', 'completarTarea');
    Route::get('tareas/tareas_mostrar_completa', 'verTareasCompletas');
    Route::get('tareas/tareas_pendientes', 'verTareasPendientes');
});
 */

 Route::controller(userController::class)->group(function(){
    Route::get('/', 'verUsuarios')->name('usuarios.verUsuarios');
    Route::get('usuarios/usuarios_crear', 'crearUsuario')->name('usuarios.crearUsuario');
    Route::get('usuarios/usuarios_modificar/{id}', 'modificarUsuario')->name('usuarios.modificarUsuario');
    Route::get('usuarios/usuarios_eliminar/{id}', 'eliminarUsuario')->name('usuarios.eliminarUsuario');
});

Route::controller(customerController::class)->group(function(){
    Route::get('clientes/clientes_mostrar', 'verClientes')->name('usuarios.verClientes');
    Route::get('clientes/clientes_crear', 'crearCliente')->name('usuarios.crearCliente');
    Route::get('clientes/clientes_modificar/{id}', 'modificarCliente')->name('usuarios.modificarCliente');
    Route::get('clientes/clientes_eliminar/{id}', 'eliminarCliente')->name('usuarios.eliminarCliente');
});

Route::controller(feeController::class)->group(function(){
    Route::get('cuotas/cuotas_mostrar', 'vercuotas')->name('usuarios.verCuotas');
    Route::get('cuotas/cuotas_crear', 'crearCuota')->name('usuarios.crearCuota');
    Route::get('cuotas/cuotas_corregir/{id}', 'corregirCuota')->name('usuarios.corregirCuota');
    Route::get('cuotas/cuotas_eliminar/{id}', 'eliminarCuota')->name('usuarios.eliminarCuota');
});

Route::controller(taskController::class)->group(function(){
    Route::get('tareas/tareas_mostrar', 'verTareas')->name('tareas.verTareas');
    Route::get('tareas/tareas_crear', 'crearTarea')->name('tareas.crearTarea');
    Route::get('tareas/tareas_modificar/{id}', 'modificarTarea')->name('tareas.modificarTarea');
    Route::get('tareas/tareas_eliminar/{id}', 'borrarTarea')->name('tareas.borrarTarea');
    Route::get('tareas/tareas_completar', 'completarTarea')->name('tareas.completarTarea');
    Route::get('tareas/tareas_mostrar_completa', 'verTareasCompletas')->name('tareas.verTareasCompletas');
    Route::get('tareas/tareas_pendientes', 'verTareasPendientes')->name('tareas.verTareasPendientes');
});

