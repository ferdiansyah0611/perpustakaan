<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\FinesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('dashboard');
})->name('home')->middleware('auth');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('users/search', [UserController::class, 'search'])->name('users.search')->middleware('admin');
Route::get('books/search', [BookController::class, 'search'])->name('books.search')->middleware('admin');
Route::get('violation', [FinesController::class, 'violation'])->name('fines.violation')->middleware('admin');

Route::resource('books', BookController::class)->middleware('admin');
Route::resource('borrowings', BorrowingController::class)->middleware('admin');
Route::resource('fines', FinesController::class)->middleware('admin');
Route::resource('categories', CategoryController::class)->middleware('admin');
Route::resource('users', UserController::class)->middleware('admin');

Route::prefix('auth')->group(function () {
    Route::get('/signin', [AuthController::class, 'signin'])->name('signin')->middleware('no-auth');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup')->middleware('no-auth');

    Route::post('/login', [AuthController::class, 'login'])->name('login')->middleware('no-auth');
    Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('no-auth');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});