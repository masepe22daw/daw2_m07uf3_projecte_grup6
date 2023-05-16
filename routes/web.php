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
Route::get('/investigador/create', [InvestigadorController::class, 'showCreateForm'])->middleware(['auth','gestor.director'])->name('investigador.create');
Route::get('/investigador/delete', [InvestigadorController::class, 'showDeleteForm'])->middleware(['auth','gestor.director'])->name('investigador.delete');
Route::get('/investigador/edit', [InvestigadorController::class, 'showUpdateForm'])->middleware(['auth','gestor.director'])->name('investigador.edit');
Route::match(['GET', 'POST'], '/investigador/buscar', [InvestigadorController::class, 'search'])->middleware(['auth','gestor.director'])->name('investigador.search');

Route::post('/investigador/store', [InvestigadorController::class, 'store'])->middleware(['auth','gestor.director'])->name('investigador.store');
Route::delete('/investigador/destroy', [InvestigadorController::class, 'destroy'])->middleware(['auth','gestor.director'])->name('investigador.destroy');
Route::put('/investigador/update', [InvestigadorController::class, 'update'])->middleware(['auth','gestor.director'])->name('investigador.update');



Route::get('/projecte', [ProjecteController::class, 'index'])->middleware(['auth','gestor.director'])->name('projecte.index');
Route::get('/projecte/create', [ProjecteController::class, 'showCreateForm'])->middleware(['auth','gestor.director'])->name('projecte.create');
Route::get('/projecte/delete', [ProjecteController::class, 'showDeleteForm'])->middleware(['auth','gestor.director'])->name('projecte.delete');
Route::get('/projecte/edit', [ProjecteController::class, 'showUpdateForm'])->middleware(['auth','gestor.director'])->name('projecte.edit');
Route::match(['GET', 'POST'], '/projecte/buscar', [ProjecteController::class, 'search'])->middleware(['auth','gestor.director'])->name('projecte.search');


Route::post('/projecte/store', [ProjecteController::class, 'store'])->middleware(['auth','gestor.director'])->name('projecte.store');
Route::delete('/projecte/destroy', [ProjecteController::class, 'destroy'])->middleware(['auth','gestor.director'])->name('projecte.destroy');
Route::put('/projecte/update', [ProjecteController::class, 'update'])->middleware(['auth','gestor.director'])->name('projecte.update');

Route::get('/participa', [ParticipaController::class, 'index'])->middleware(['auth','gestor.director'])->name('participa.index');
Route::get('/participa/create', [ParticipaController::class, 'showCreateForm'])->middleware(['auth','gestor.director'])->name('participa.create');

Route::post('/participa/store', [ParticipaController::class, 'store'])->middleware(['auth','gestor.director'])->name('participa.store');


Route::get('/usuaris', [ParticipaController::class, 'index'])->middleware(['auth','gestor.director'])->name('usuaris.index');



require __DIR__.'/auth.php';