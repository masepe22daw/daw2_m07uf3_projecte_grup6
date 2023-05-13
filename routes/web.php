<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestigadorController;
use App\Http\Controllers\ProjecteController;
use App\Http\Controllers\ParticipaController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/investigador', [InvestigadorController::class, 'index'])->middleware(['auth','gestor.director'])->name('investigador.index');
Route::get('/investigador/create', [InvestigadorController::class, 'create'])->middleware(['auth','gestor.director'])->name('investigador.create');
Route::get('/investigador/delete', [InvestigadorController::class, 'showDeleteForm'])->middleware(['auth','gestor.director'])->name('investigador.delete');

Route::post('/investigador/store', [InvestigadorController::class, 'store'])->middleware(['auth','gestor.director'])->name('investigador.store');
Route::post('/investigador/delete', [InvestigadorController::class, 'destroy'])->middleware(['auth','gestor.director'])->name('investigador.destroy');


Route::get('/projecte', [ProjecteController::class, 'index'])->middleware(['auth','gestor.director'])->name('projecte.index');


Route::get('/participa', [ParticipaController::class, 'index'])->middleware(['auth','gestor.director'])->name('participa.index');

Route::get('/usuaris', [ParticipaController::class, 'index'])->middleware(['auth','gestor.director'])->name('usuaris.index');



require __DIR__.'/auth.php';