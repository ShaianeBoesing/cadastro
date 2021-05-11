<?php

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/index', function (){
    return view('index');
});

Route::get('/produtos', function (){
    return view('produtos');
})->name('produtos');

Route::get('/categorias', function (){
    return view('categorias');
})->name('categorias');


Route::resource('/produtos', '\App\Http\Controllers\ControladorProduto'::class);

Route::resource('/categorias', '\App\Http\Controllers\ControladorCategoria'::class);
