<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');

    Route::get('/cabañas', 'cabins')->name('cabanas');
    Route::get('/jacuzzis', 'jacuzzis')->name('jacuzzis');
    Route::get('/amenidades', 'amenities')->name('amenidades');
    
    Route::get('/cabaña/{slug}', 'details')->name('detalles');
    Route::get('/jacuzzi/{slug}', 'detailsJacuzzi')->name('detallesJacuzzi');
    Route::get('/amenidades/{slug}', 'detailsAmenitie')->name('detallesAmenidad');

    Route::post('/horarios-disponibilidad', 'availableSchedules')->name('horarios.disponibilidad');
});

Auth::routes();

// Login
Route::controller(LoginController::class)->group(function () {
    Route::get('/logout', 'logout');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
