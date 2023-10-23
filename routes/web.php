<?php

use App\Http\Controllers\DisciplinaController;
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
Route::prefix('/')->group(function () {
    Route::get('/', [DisciplinaController::class, 'index'])->name('disciplina.index');

    Route::get('/cadastro', [DisciplinaController::class, 'create'])->name('disciplina.create');

    Route::post('/', [DisciplinaController::class, 'store'])->name('disciplina.store');
    
    Route::delete('/{id}', [DisciplinaController::class, 'destroy'])->name('disciplina.delete');

    Route::get('/{id}/view-ementa', [DisciplinaController::class, 'view_ementa'])->name('disciplina.ementa');

});