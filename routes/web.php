<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('clients', ClientController::class);
    Route::get('/clients/{client}/show/add-funds', [ClientController::class, 'addFunds'])->name('clients.addFunds');
    Route::get('/clients/{client}/show/remove-funds', [ClientController::class, 'removeFunds'])->name('clients.removeFunds');
    Route::post('/clients/{client}/show/add-store-funds', [ClientController::class, 'addStoreFunds'])->name('clients.addStoreFunds');
    Route::post('/clients/{client}/show/remove-store-funds', [ClientController::class, 'removeStoreFunds'])->name('clients.removeStoreFunds');
});

Auth::routes();