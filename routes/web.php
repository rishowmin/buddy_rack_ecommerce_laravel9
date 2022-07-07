<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // Category
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category/list', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category/list', 'store');
        Route::get('/category/edit/{category}', 'edit');
        Route::put('/category/list/{category}', 'update');
    });

    // Manufacturer
    Route::controller(App\Http\Controllers\Admin\ManufacturerController::class)->group(function () {
        Route::get('/manufacturer/list', 'index');
        Route::get('/manufacturer/create', 'create');
        Route::post('/manufacturer/list', 'store');
        Route::get('/manufacturer/edit/{manufacturer}', 'edit');
        Route::put('/manufacturer/list/{manufacturer}', 'update');
    });

    // Product Attribute
    Route::controller(App\Http\Controllers\Admin\ProductAttributeController::class)->group(function () {
        Route::get('/attribute/list', 'index');
        Route::get('/attribute/create', 'create');
        Route::post('/attribute/list', 'store');
        Route::get('/attribute/edit/{productAttribute}', 'edit');
        Route::put('/attribute/list/{productAttribute}', 'update');
    });

    // Product
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/product/list', 'index');
        Route::get('/product/create', 'create');
        Route::post('/product/list', 'store');
        Route::get('/product/edit/{product}', 'edit');
        Route::put('/product/list/{product}', 'update');
    });
});

