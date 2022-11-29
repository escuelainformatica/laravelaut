<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// UsuarioAPIController

// abilities = el usuario tiene que tener todas las habilidades indicadas.
// ability = el usuario debe tener por lo menos una.

Route::middleware(['auth:sanctum','ability:leer,editar'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [\App\Http\Controllers\UsuarioAPIController::class, 'login'])->name('login_api');
