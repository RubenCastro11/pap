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
    return view('welcome');
});

Route::get('/estilo','App\Http\Controllers\EstiloController@index')->name('estilos.index');

Route::get('/estilo/{id_estilo}/show','App\Http\Controllers\EstiloController@show')->name('estilos.show');

Route::get('/estilo/create','App\Http\Controllers\EstiloController@create')->name('estilos.create')->middleware('auth');

Route::post('/estilo','App\Http\Controllers\EstiloController@store')->name('estilos.store')->middleware('auth');

Route::get('/estilo/{id_estilo}/edit','App\Http\Controllers\EstiloController@edit')->name('estilos.edit')->middleware('auth');

Route::patch('/estilo/{id_estilo}/','App\Http\Controllers\EstiloController@update')->name('estilos.update')->middleware('auth');





Route::get('/mota','App\Http\Controllers\MotaController@index')->name('motas.index');

Route::get('/mota/{id}/show','App\Http\Controllers\MotaController@show')->name('motas.show');

Route::get('/mota/create','App\Http\Controllers\MotaController@create')->name('motas.create')->middleware('auth');

Route::post('/mota','App\Http\Controllers\MotaController@store')->name('motas.store')->middleware('auth');




Route::get('/publicidade','App\Http\Controllers\PublicidadeController@index')->name('publicidades.index');

Route::get('/publicidade/{id}/show','App\Http\Controllers\PublicidadeController@show')->name('publicidades.show');

Route::get('/publicidade/create','App\Http\Controllers\PublicidadeController@create')->name('publicidades.create')->middleware('auth');

Route::post('/publicidade','App\Http\Controllers\PublicidadeController@store')->name('publicidades.store')->middleware('auth');




Route::get('/marca','App\Http\Controllers\MarcaController@index')->name('marcas.index');

Route::get('/marca/{id}/show','App\Http\Controllers\MarcaController@show')->name('marcas.show');

Route::get('/marca/create','App\Http\Controllers\MarcaController@create')->name('marcas.create')->middleware('auth');

Route::post('/marca','App\Http\Controllers\MarcaController@store')->name('marcas.store')->middleware('auth');


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
