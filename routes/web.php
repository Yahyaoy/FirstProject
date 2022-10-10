<?php

use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('products',[ProductController::class, 'index'])->name('proudcts.index');
// Route::get('products/{p}',[ProductController::class, 'show'])->name('proudcts.show');
// Route::get('products/create',[ProductController::class, 'create'])->name('proudcts.create');
// Route::post('products',[ProductController::class, 'store'])->name('proudcts.store');
// Route::get('products/{product}/edit',[ProductController::class, 'edit'])->name('proudcts.edit');
// Route::put('products/{product}',[ProductController::class,'update'])->name('products.update');
// Route::delete('products/{product}',[ProductController::class,'delete'])->name('products.delete');

Route::resource('products', ProductController::class);
