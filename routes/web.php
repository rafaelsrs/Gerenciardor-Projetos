<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProjectController::class, 'index']);

Route::post("/adicionar-projeto", "App\Http\Controllers\ProjectController@create");
Route::put('/{id}/editar', 'App\Http\Controllers\ProjectController@update');
Route::delete('/{id}/excluir-projeto', 'App\Http\Controllers\ProjectController@delete');

Route::delete('/{id}/excluir-atividade', 'App\Http\Controllers\ActivityController@delete');

//Route::get('/', function () {
//    return view('projeto/index');
//});
