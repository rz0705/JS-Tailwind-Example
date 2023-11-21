<?php

use App\Http\Controllers\AddProductController;
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

Route::get('/add-product', function () {
    return view('add-product');
});

// Add a route for handling form submissions
Route::post('/add-product', [AddProductController::class, 'store'])->name("add-product");