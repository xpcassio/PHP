<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadasController;
use App\Http\Controllers\EpisodiosController;
use App\Http\Controllers\EntrarController;
use App\Http\Controllers\RegistroController;

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

Route::get('/series', [SeriesController::class, 'index'])->name('rota_series');

Route::get('/series/criar', [SeriesController::class, 'criar'])->name('rota_series_criar');
Route::post('/series/criar', [SeriesController::class, 'store']);

Route::delete('/series/remover/{id}', [SeriesController::class, 'destroy']);

Route::get('/series/{id}/temporadas', [TemporadasController::class, 'index']);

Route::post('/series/{id}/editaNome', [SeriesController::class, 'editaNome']);

Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class, 'index']);
Route::post('/temporada/{temporada}/episodios/assistir', [EpisodiosController::class, 'assistir']);

Route::get('/entrar', [EntrarController::class, 'index']);
Route::post('/entrar', [EntrarController::class, 'entrar']);

Route::get('/registrar', [RegistroController::class, 'create']);
Route::post('/registrar', [RegistroController::class, 'store']);

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});