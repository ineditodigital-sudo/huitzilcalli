<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CabinController;
use App\Http\Controllers\JacuzziController;
use App\Http\Controllers\AmenitieController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PromotionController;

/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register admin routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/admin', [AdminController::class, 'admin_dashboard'])->name('admin.dashboard')->middleware(['auth', 'admin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
  
  Route::resource('cabañas', CabinController::class);
  Route::controller(CabinController::class)->group(function () {
    Route::post('/cabañas/guardar', 'store')->name('cabañas.store');

    Route::get('/cabañas/ver/{id}', 'show')->name('cabañas.show');
    Route::delete('/cabañas/eliminar/{id}', 'destroy')->name('cabañas.delete');
    
    Route::post('/cabañas/upload/{id}', 'upload')->name('cabañas.upload');
    Route::post('/cabaña/status', 'changeStatus')->name('cabaña.status');

    Route::get('/cabañas/show', 'show')->name('cabañas.list');
  });

  Route::resource('jacuzzis', JacuzziController::class);
  Route::controller(JacuzziController::class)->group(function () {
    Route::post('/jacuzzis/guardar', 'store')->name('jacuzzis.store');

    Route::get('/jacuzzis/ver/{id}', 'show')->name('jacuzzis.show');
    Route::delete('/jacuzzis/eliminar/{id}', 'destroy')->name('jacuzzis.delete');
    
    Route::post('/jacuzzis/upload/{id}', 'upload')->name('jacuzzis.upload');
    Route::post('/jacuzzi/status', 'changeStatus')->name('jacuzzi.status');

    Route::get('/jacuzzis/show', 'show')->name('jacuzzis.list');
  });

  Route::resource('amenidades', AmenitieController::class);
  Route::controller(AmenitieController::class)->group(function () {
    Route::post('/amenidades/guardar', 'store')->name('amenidades.store');

    Route::get('/amenidades/ver/{id}', 'show')->name('amenidades.show');
    Route::delete('/amenidades/eliminar/{id}', 'destroy')->name('amenidades.delete');
    
    Route::post('/amenidades/upload/{id}', 'upload')->name('amenidades.upload');
    Route::post('/amenidades/status', 'changeStatus')->name('amenidades.status');

    Route::get('/amenidades/show', 'show')->name('amenidades.list');
  });
  
  Route::controller(ReservationController::class)->group(function () {
    Route::get('/reservaciones/{service_type}/{slug?}', 'index')->name('reservaciones.cabaña');
    Route::post('/reservaciones/{service_type}/guardar', 'store')->name('reservaciones.store');
    Route::post('/reservaciones/{service_type}/guardarJacuzzi', 'storeJacuzzi')->name('reservaciones.jacuzzi.store');
    Route::post('/reservaciones/{service_type}/guardarAmenidad', 'storeAmenitie')->name('reservaciones.amenidad.store');

    Route::get('/reserva/ver/{id}/{cabin_id?}', 'show')->name('reservaciones.show'); 

    Route::get('/reservaciones', [ReservationController::class, 'searchReservations'])->name('reservaciones.search');
    Route::get('/searchByName', [ReservationController::class, 'searchReservationsByName'])->name('reservaciones.searchByName');

    Route::delete('/reserva/eliminar/{id}', 'destroy')->name('reservaciones.delete');

    Route::get('/res/{service_type}/json/{cabin_id?}', 'jsonReservations')->name('reservaciones.json');
    Route::get('/rev/{service_type}/mobilejson/{cabin_id?}', 'mobileJsonReservations')->name('reservaciones.mobilejson');
    
    Route::post('/deshabilitar/dia', 'disableDay')->name('reservaciones.deshabilitar');
    Route::post('/reservaciones/dia', 'loadDay')->name('reservaciones.dia');
    Route::get('/dias/json/{cabin_id?}', 'jsonDisableDays')->name('dias.json');
    Route::post('/res/{service_type}/dia2/', 'getEventsByDate')->name('reservaciones.dia2');

    Route::get('/reservaciones/jacuzzi/{slug?}', 'indexJacuzzi')->name('reservaciones.jacuzzi');
    
 
    Route::get('/reserv/verificar/{id?}', 'checkJacuzziDayAvailability')->name('reservaciones.revisar.jacuzzi');
    Route::get('/reserv/verificar/{id?}', 'checkAmenitieDayAvailability')->name('reservaciones.revisar.amenidad');
  });
  
  Route::controller(AdminController::class)->group(function () {
    Route::get('/perfil', 'profile')->name('admin.profile'); 
    Route::get('/perfil/show/{json?}', 'show')->name('admin.profile.show');
    Route::post('/profile/edit', 'edit')->name('admin.edit');
    Route::post('/changePassword', 'changePassword')->name('admin.password');
    Route::post('/updateSettings', 'updateSettings')->name('admin.update.settings');
    Route::get('/perfil/settings', 'getSettings')->name('admin.get.settings');
    
    Route::post('/updateDiscount', 'updateDiscount')->name('admin.update.jacuzzi_discount');
    Route::get('/perfil/settingsDiscount', 'getSettingsDiscount')->name('admin.get.settings_discount');
  });

  Route::controller(ScheduleController::class)->group(function () {
    Route::get('/horarios', 'index')->name('jacuzzi.horarios');

    Route::post('/horarios/guardar', 'store')->name('jacuzzi.horarios.store');
    Route::get('/horarios/ver/{id}', 'show')->name('jacuzzi.horarios.show');
    Route::delete('/horarios/eliminar/{id}', 'destroy')->name('jacuzzi.horarios.delete');
  });

  Route::controller(PromotionController::class)->group(function () {
    Route::get('/promociones', 'index')->name('promociones.index');
    Route::post('/promociones/guardar', 'store')->name('promociones.store');
    Route::get('/promociones/ver/{id}', 'show')->name('promociones.show');
    Route::delete('/promociones/eliminar/{id}', 'destroy')->name('promociones.delete');
    Route::post('/promociones/status', 'changeStatus')->name('promociones.status');
  });

});