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
    Route::get('usuarios/usuarios_crear', 'verCrearUsuario');
    Route::get('usuarios/usuarios_modificar/{id}', 'verModificarUsuario');
    Route::get('usuarios/usuarios_eliminar/{id}', 'verEliminarUsuario');
});

Route::controller(taskController::class)->group(function(){
    Route::get('tareas/tareas_mostrar', 'verTareas');
    Route::get('tareas/tareas_crear', 'verTareasCrear');
    Route::get('tareas/tareas_modificar', 'verTareasModificar');
    Route::get('tareas/tareas_eliminar/{id}', 'verTareasEliminar');
    Route::get('tareas/tareas_completar', 'verCompletar');
    Route::get('tareas/tareas_mostrar_completa', 'verTareasCompletas');
    Route::get('tareas/tareas_eliminadas', 'verTareasEliminadas');
    Route::get('tareas/tareas_pendientes', 'verTareasPendientes');
    Route::get('tareas/borrarUsuario/{$id}', 'borrarUsuario');
});


