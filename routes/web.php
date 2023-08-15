<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Import the Request class
use App\Models\Book; // Correct namespace
use App\Http\Controllers\BookController; // Correct namespace

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
/// method -> http request -> get , post
Route::get('/', function () {
    return view('welcome');
});

// create route /profile

Route::middleware(['auth','CheckAge'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books');
    Route::get('/create-book', [BookController::class, 'show'])->name('create_book');
    Route::post('/create-book', [BookController::class, 'create']);
    Route::get('/books/{id}', [BookController::class, 'showBook'])->name('show_book');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('destroy_book');
});




Route::get('dash', function () {
    $page2 = "dashboard";
    return view('dashboard', ['page' => $page2]);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');