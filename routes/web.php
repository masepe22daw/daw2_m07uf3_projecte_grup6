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
Route::match(['GET', 'POST'], '/investigador/buscar', [InvestigadorController::class, 'generarPDF'])->middleware(['auth','gestor.director'])->name('investigador.pdf');





Route::post('/investigador/store', [InvestigadorController::class, 'store'])->middleware(['auth','gestor.director'])->name('investigador.store');
Route::delete('/investigador/delete', [InvestigadorController::class, 'destroy'])->middleware(['auth','gestor.director'])->name('investigador.destroy');
Route::put('/investigador/update', [InvestigadorController::class, 'update'])->name('investigador.update');



Route::get('/projecte', [ProjecteController::class, 'index'])->middleware(['auth','gestor.director'])->name('projecte.index');


Route::get('/participa', [ParticipaController::class, 'index'])->middleware(['auth','gestor.director'])->name('participa.index');

Route::get('/usuaris', [ParticipaController::class, 'index'])->middleware(['auth','gestor.director'])->name('usuaris.index');



require __DIR__.'/auth.php';