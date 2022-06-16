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
Route::get('/especialidades/lista', 'App\Http\Controllers\EspecialidadesController@create')->name('listar_especialidades');

Route::post('/profissionais/lista', 'App\Http\Controllers\ProfissionalController@lista');
Route::get('/profissional/agendar/{id_profissional}/{especialidade}', 'App\Http\Controllers\ProfissionalController@create');

Route::post('/agendamento/store', 'App\Http\Controllers\AgendamentoController@store');
Route::get('/agendamento', 'App\Http\Controllers\AgendamentoController@index');

