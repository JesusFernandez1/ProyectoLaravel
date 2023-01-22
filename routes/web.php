<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\taskController;

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
    Route::get('/', 'verUsuarios');
    Route::get('usuarios/usuarios_crear', 'crearUsuario');
    Route::get('usuarios/usuarios_modificar/{id}', 'modificarUsuario');
    Route::get('usuarios/usuarios_eliminar/{id}', 'eliminarUsuario');
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


