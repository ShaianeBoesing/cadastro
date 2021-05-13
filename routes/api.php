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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias', [\App\Http\Controllers\ControladorCategoria::class, 'indexJson']);
Route::get('/vendedores', [\App\Http\Controllers\ControladorVendedor::class, 'indexVendedor']);
Route::resource('/vendedores', \App\Http\Controllers\ControladorVendedor::class);

