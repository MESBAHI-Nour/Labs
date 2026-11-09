<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategorieController::class, 'index'])
    ->name('categories');
Route::get('/categories/create', [CategorieController::class, 'ajouterCategorie'])
    ->name('categories.create');
Route::post('/categories', [CategorieController::class, 'storeCategorie'])
    ->name('categories.store');
Route::get('/categories/{id}/edit', [CategorieController::class, 'editCategorie'])
    ->name('categories.edit');
Route::put('/categories/{id}', [CategorieController::class, 'updateCategorie'])
    ->name('categories.update');
Route::delete('/categories/{id}', [CategorieController::class, 'deleteCategorie'])
    ->name('categories.destroy');
    