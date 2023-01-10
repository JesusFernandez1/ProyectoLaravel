<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
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

Route::controller(loginController::class)->group(function(){
    Route::get('/', 'inicio');
    Route::get('usuarios', 'login');
    Route::get('usuarios/verUsuarios', 'verUsuarios');
    Route::get('usuarios/verUnicoUsuario/{id}', 'verUnicoUsuario');
    Route::get('usuarios/crearUsuario', 'crearUsuario');
    Route::get('usuarios/comprobarBorrarUsuario/{id}', 'comprobarBorrarUsuario');
    Route::get('usuarios/borrarUsuario/{$id}', 'borrarUsuario');
});




