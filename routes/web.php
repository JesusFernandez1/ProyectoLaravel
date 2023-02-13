<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\taskController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\feeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('base');
})->middleware(['auth', 'verified'])->name('blade');

Route::controller(userController::class)->group(function(){
    Route::get('usuarios/usuarios_eliminada/{id}', 'confirmarEliminarUsuario')->middleware('auth')->name('usuarios.confirmarEliminarUsuario');
});
Route::resource('usuarios', userController::class);

Route::controller(customerController::class)->group(function(){
    Route::get('clientes/clientes_crearIncidencia', 'nuevaIncidencia')->middleware('auth')->middleware('admin')->name('clientes.nuevaIncidencia');
    Route::get('clientes/clientes_incidenciaCreada', 'crearIncidencia')->middleware('auth')->name('clientes.crearIncidencia');
    Route::get('clientes/clientes_eliminado/{id}', 'confirmarEliminarCliente')->middleware('auth')->name('clientes.confirmarEliminarCliente');
});
Route::resource('clientes', customerController::class);

Route::controller(feeController::class)->group(function(){
    Route::get('cuotas/cuotas_crear/{id}', 'agregar')->middleware('auth')->name('cuotas.agregar');
    Route::get('cuotas/cuotas_eliminada/{id}', 'confirmarEliminarCuota')->middleware('auth')->name('cuotas.confirmarEliminarCuota');
});
Route::resource('cuotas', feeController::class);

Route::controller(taskController::class)->group(function(){
    Route::get('tareas/tareas_verInformacionDetallada', 'verInformacionDetallada')->middleware('auth')->name('tareas.verInformacionDetallada');
    Route::get('tareas/tareas_pendientes', 'verTareasPendientes')->middleware('auth')->middleware('admin')->name('tareas.verTareasPendientes');
    Route::get('tareas/tareas_noAsignadas', 'verTareasNoAsignadas')->middleware('auth')->name('tareas.verTareasNoAsignadas');
    Route::get('tareas/tareas_asignada', 'verTareasNoAsignadas')->middleware('auth')->name('tareas.verTareasNoAsignadas');
    Route::get('tareas/tareas_eliminada/{id}', 'confirmarBorrarTarea')->middleware('auth')->name('tareas.confirmarBorrarTarea');
    Route::get('tareas/tareas_completar/{id}', 'completarTarea')->middleware('auth')->name('tareas.completarTarea');
});
Route::resource('tareas', taskController::class);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
