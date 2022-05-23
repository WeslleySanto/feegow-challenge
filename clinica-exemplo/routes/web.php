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
Route::get('/especialidades/lista', 'App\Http\Controllers\EspecialidadesController@lista');

Route::post('/profissionais/lista', 'App\Http\Controllers\ProfissionalController@lista');
Route::get('/profissional/agendar/{id_profissional}', 'App\Http\Controllers\ProfissionalController@agendar');
Route::post('/profissional/create', 'App\Http\Controllers\ProfissionalController@create');

