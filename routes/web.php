<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestigadorController;
use App\Http\Controllers\ProjecteController;
use App\Http\Controllers\ParticipaController;
use App\Http\Controllers\UsuarisController;

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

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas per el controlador InvestigadorController
    Route::middleware(['gestor.director'])->group(function () {
        Route::get('/investigador', [InvestigadorController::class, 'index'])->name('investigador.index');
        Route::get('/investigador/create', [InvestigadorController::class, 'showCreateForm'])->name('investigador.create');
        Route::get('/investigador/delete', [InvestigadorController::class, 'showDeleteForm'])->name('investigador.delete');
        Route::get('/investigador/edit', [InvestigadorController::class, 'showUpdateForm'])->name('investigador.edit');
        Route::match(['GET', 'POST'], '/investigador/buscar', [InvestigadorController::class, 'search'])->name('investigador.search');
        Route::get('/investigador/pdf-form', [InvestigadorController::class, 'showPdfForm'])->name('investigador.pdf-form');
        Route::post('/investigador/generar-pdf', [InvestigadorController::class, 'generarPDF'])->name('investigador.generar-pdf');
        Route::post('/investigador/store', [InvestigadorController::class, 'store'])->name('investigador.store');
        Route::delete('/investigador/destroy', [InvestigadorController::class, 'destroy'])->name('investigador.destroy');
        Route::put('/investigador/update', [InvestigadorController::class, 'update'])->name('investigador.update');
    });

    // Rutas per el controlador ProjecteController
    Route::middleware(['gestor.director'])->group(function () {
        Route::get('/projecte', [ProjecteController::class, 'index'])->name('projecte.index');
        Route::get('/projecte/create', [ProjecteController::class, 'showCreateForm'])->name('projecte.create');
        Route::get('/projecte/delete', [ProjecteController::class, 'showDeleteForm'])->name('projecte.delete');
        Route::get('/projecte/edit', [ProjecteController::class, 'showUpdateForm'])->name('projecte.edit');
        Route::match(['GET', 'POST'], '/projecte/buscar', [ProjecteController::class, 'search'])->name('projecte.search');
        Route::get('/projecte/pdf-form', [ProjecteController::class, 'showPdfForm'])->name('projecte.pdf-form');
        Route::post('/projecte/generar-pdf', [ProjecteController::class, 'generarPDF'])->name('projecte.generar-pdf');
        Route::post('/projecte/store', [ProjecteController::class, 'store'])->name('projecte.store');
        Route::delete('/projecte/destroy', [ProjecteController::class, 'destroy'])->name('projecte.destroy');
        Route::put('/projecte/update', [ProjecteController::class, 'update'])->name('projecte.update');
    });

    // Rutas per el controlador ParticipaController
Route::middleware(['gestor.director'])->group(function () {
    Route::get('/participa', [ParticipaController::class, 'index'])->name('participa.index');
    Route::get('/participa/create', [ParticipaController::class, 'showCreateForm'])->name('participa.create');
    Route::get('/participa/delete', [ParticipaController::class, 'showDeleteForm'])->name('participa.delete');
    Route::get('/participa/edit', [ParticipaController::class, 'showUpdateForm'])->name('participa.edit');
    Route::match(['GET', 'POST'], '/participa/buscar', [ParticipaController::class, 'search'])->name('participa.search');
    Route::get('/participa/pdf-form', [ParticipaController::class, 'showPdfForm'])->name('participa.pdf-form');
    Route::post('/participa/generar-pdf', [ParticipaController::class, 'generarPDF'])->name('participa.generar-pdf');
    Route::post('/participa/store', [ParticipaController::class, 'store'])->name('participa.store');
    Route::delete('/participa/destroy', [ParticipaController::class, 'destroy'])->name('participa.destroy');
    Route::put('/participa/update', [ParticipaController::class, 'update'])->name('participa.update');
});

    // Rutas per el controlador UsuarisController
Route::middleware(['director'])->group(function () {
    Route::get('/usuaris', [UsuarisController::class, 'index'])->name('usuaris.index');
    Route::get('/usuaris/create', [UsuarisController::class, 'showCreateForm'])->name('usuaris.create');
    Route::get('/usuaris/delete', [UsuarisController::class, 'showDeleteForm'])->name('usuaris.delete');
    Route::get('/usuaris/edit', [UsuarisController::class, 'showUpdateForm'])->name('usuaris.edit');
    Route::match(['GET', 'POST'], '/usuaris/buscar', [UsuarisController::class, 'search'])->name('usuaris.search');
    Route::get('/usuaris/pdf-form', [UsuarisController::class, 'showPdfForm'])->name('usuaris.pdf-form');
    Route::post('/usuaris/generar-pdf', [UsuarisController::class, 'generarPDF'])->name('usuaris.generar-pdf');
    Route::post('/usuaris/store', [UsuarisController::class, 'store'])->name('usuaris.store');
    Route::delete('/usuaris/destroy', [UsuarisController::class, 'destroy'])->name('usuaris.destroy');
    Route::put('/usuaris/update', [UsuarisController::class, 'update'])->name('usuaris.update');
});
});


require __DIR__.'/auth.php';
