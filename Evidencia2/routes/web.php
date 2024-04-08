<?php

use App\Http\Controllers\LibrosController;
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

Route::get('/', function () {
    return view('welcome');
});

//index
Route::get('/biblioteca', [LibrosController::class, 'index'])->name('biblioteca.index');
//create
Route::get('/biblioteca/create', [LibrosController::class, 'create'])->name('biblioteca.create');
//store
Route::post('/biblioteca', [LibrosController::class, 'store'])->name('biblioteca.store');
//edit
Route::get('/biblioteca/{id}/edit', [LibrosController::class, 'edit'])->name('biblioteca.edit');
//update
Route::put('/biblioteca/{id}', [LibrosController::class, 'update'])->name('biblioteca.update');
//delete
Route::delete('/biblioteca/{id}', [LibrosController::class, 'destroy'])->name('biblioteca.destroy');