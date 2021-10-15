<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerMainController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SuppliersController;
use App\Models\Suppliers;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/404', function () {
    return view('pagenotfound');
})->name('404');

Route::get('/suppliers/pdf',[SuppliersController::class,'createPDF']);
Route::get('/categories/pdf',[CategoriesController::class,'createPDF']);
Route::get('/products/pdf',[ProductsController::class,'createPDF']);
Route::get('/customers/pdf',[CustomersController::class,'createPDF']);
Route::get('/sales/pdf',[SalesController::class,'createPDF']);
Route::get('/dashboard',[DashboardController::class,'dashboardManager'])->name('dashboard');

Route::get('/supplierSearch',[SuppliersController::class,'searchSuppliers'])->name('SupplierSearch');
Route::get('/categorySearch',[CategoriesController::class,'searchCategories'])->name('CategoriesSearch');
Route::get('/customerSearch',[CustomersController::class,'searchCustomers'])->name('CustomersSearch');
Route::get('/productSearch',[ProductsController::class,'searchProducts'])->name('ProductsSearch');


Route::resource('categories', CategoriesController::class);
Route::resource('suppliers', SuppliersController::class);
Route::resource('customers', CustomersController::class);
Route::resource('products', ProductsController::class);
Route::resource('sales', SalesController::class);
require __DIR__.'/auth.php';
