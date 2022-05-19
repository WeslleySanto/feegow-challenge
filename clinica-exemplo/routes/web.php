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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/especialidades', function(){
//     return view('especialidades');
// });

// Route::get('/profissionais', function(){
//     return view('profissionais');
// });

// Route::get('/agendar/{$id_profissional}', function($id_profissional){
//     return view('agendar');
// });

Route::get('/especialidades', 'App\Http\Controllers\EspecialidadesController@index');
Route::post('/profissionais', 'App\Http\Controllers\ProfissionalController@index');
Route::get('/agendar/{$id_profissional}', 'Agendar@index');

