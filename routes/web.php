<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\LibraryController;

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

Route::get('/', [PublicController::class, ('homepage')])->name('homepage');
Route::get('/library/index', [LibraryController::class, 'index'])->name('library.index');
Route::get('/library/create', [LibraryController::class, 'create'])->name('library.create');
Route::get('/library/show/{library}', [LibraryController::class, 'show'])->name('library.show');
Route::get('/library/edit/{library}', [LibraryController::class, 'edit'])->name('library.edit');