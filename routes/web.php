<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerMainController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

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
Route::get('/404', function () {
    return view('pagenotfound');
})->name('404');

Route::resource('categories', CategoriesController::class);
Route::resource('suppliers', SuppliersController::class);
Route::resource('customers', CustomersController::class);
require __DIR__.'/auth.php';
