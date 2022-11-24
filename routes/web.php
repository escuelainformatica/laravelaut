<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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


Route::controller(UsuarioController::class)->group(function () {
    Route::any('/login', 'login')->name('login');
    Route::any('/ingreso', 'ingreso')->middleware(['auth','can:escribir']); // solo los que tienen permiso de escribir
    Route::any('/listado', 'listado')->middleware(['auth','can:leer']); // quiero que todos pueden ingresar

    Route::any('/ingresoadmin', 'ingreso')->middleware(['auth','role:admin']);
});
