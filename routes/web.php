<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ContactController;

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
})->name('homme');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
// Route::post('/borrow/{id}', [BookController::class, 'borrow'])->name('borrow.book');
Route::get('/search', [BookController::class, 'search'])->name('books.search');

Route::middleware('auth')->group(function () {
    Route::post('/borrow/{id}', [BookController::class, 'borrow'])->name('borrow.book');
    Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
    // Route::get('/books', [BookController::class, 'index'])->name('books.index');
    // Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    // Ajoutez d'autres routes protégées ici
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
