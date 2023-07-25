<?php

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
Auth::routes();


Route::get('/', [App\Http\Controllers\PwaHomeController::class, 'index'])->name('index');
Route::get('/offline', function () {    
    return view('vendor/laravelpwa/offline');
});


Route::get('/acceso-restringido', function () {    
    return view('acceso-restringido');
});

Route::post('push', 'SubscriptionController@store');
Route::post('subscription/delete', 'SubscriptionController@destroy');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
