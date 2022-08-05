<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController as C;
use App\Http\Controllers\HotelController as H;
use App\Http\Controllers\OrderController as O;


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

//Front
Route::get('', [H::class, 'pick'])->name('hotels-pick');



// Countries

Route::prefix('countries')->name('countries-')->group(function () {
    Route::get('', [C::class, 'index'])->name('index');
    Route::get('create', [C::class, 'create'])->name('create');
    Route::post('', [C::class, 'store'])->name('store');
    Route::get('edit/{country}', [C::class, 'edit'])->name('edit');
    Route::put('{country}', [C::class, 'update'])->name('update');
    Route::delete('{country}', [C::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [C::class, 'show'])->name('show');    
});

// Hotels

Route::prefix('hotels')->name('hotels-')->group(function () {
    Route::get('', [H::class, 'index'])->name('index');
    Route::get('create', [H::class, 'create'])->name('create');
    Route::post('', [H::class, 'store'])->name('store');
    Route::get('edit/{hotel}', [H::class, 'edit'])->name('edit');
    Route::put('{hotel}', [H::class, 'update'])->name('update');
    Route::delete('{hotel}', [H::class, 'destroy'])->name('delete');
    Route::get('show/{id}', [H::class, 'show'])->name('show');
    Route::put('delete-picture/{hotel}', [H::class, 'deletePicture'])->name('delete-picture'); 
});



// Orders

Route::post('add-hotel-to-order', [O::class, 'add'])->name('pickHotel-add');
Route::get('my-orders', [O::class, 'showMyOrders'])->name('my-orders');
Route::prefix('order')->name('selectedServices-')->group(function () {
    Route::get('', [O::class, 'index'])->name('index');
    Route::put('status/{order}', [O::class, 'setStatus'])->name('status');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
