<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LivreController;
Route::get('/', [LivreController::class, 'accueil'])->name('books.accueil');
Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');
Route::get('/livres/{id}', [LivreController::class, 'show'])->name('livres.show');
Route::delete('/livres/{id}', [LivreController::class, 'destroy'])->name('livres.destroy');

