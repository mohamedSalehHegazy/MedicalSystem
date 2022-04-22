<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DeliveriesController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ServiceProvidersController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'admin/'], function () {

    /** 
    * Categories 
    */
    Route::group(['prefix'=>'categories'], function() {
        Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
        Route::get('/trashed', [CategoriesController::class, 'trashed'])->name('categories.trashed');
        Route::get('/{id}', [CategoriesController::class, 'show'])->name('categories.show');
        Route::post('/', [CategoriesController::class, 'store'])->name('categories.store');
        Route::post('/{id}', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
        Route::put('/restore/{id}', [CategoriesController::class, 'restore'])->name('categories.restore');
        Route::put('/changeStatues/{id}', [CategoriesController::class, 'changeStatues'])->name('categories.changeStatues');
    });

    /**
     * Delivery
     */
    Route::group(['prefix'=>'deliveries'], function() {
        Route::get('/', [DeliveriesController::class, 'index'])->name('delivery.index');
        Route::get('/trashed', [DeliveriesController::class, 'trashed'])->name('delivery.trashed');
        Route::get('/{id}', [DeliveriesController::class, 'show'])->name('delivery.show');
        Route::post('/', [DeliveriesController::class, 'store'])->name('delivery.store');
        Route::put('/{id}', [DeliveriesController::class, 'update'])->name('delivery.update');
        Route::delete('/{id}', [DeliveriesController::class, 'destroy'])->name('delivery.destroy');
        Route::put('/restore/{id}', [DeliveriesController::class, 'restore'])->name('delivery.restore');
        Route::put('/changeStatues/{id}', [DeliveriesController::class, 'changeStatues'])->name('delivery.changeStatues');
    });

    /**
     * Reservations
     */
    Route::group(['prefix'=>'reservations'], function() {
        Route::get('/', [ReservationController::class, 'index'])->name('reservations.index');
        Route::put('/changeStatues/{id}', [ReservationController::class, 'changeStatues'])->name('reservations.changeStatues');
    });

    /**
    * Services
    */
    Route::group(['prefix'=>'services'], function() {
        Route::get('/', [ServicesController::class, 'index'])->name('service.index');
        Route::get('/trashed', [ServicesController::class, 'trashed'])->name('service.trashed');
        Route::get('/{id}', [ServicesController::class, 'show'])->name('service.show');
        Route::post('/', [ServicesController::class, 'store'])->name('service.store');
        Route::post('/{id}', [ServicesController::class, 'update'])->name('service.update');
        Route::delete('/{id}', [ServicesController::class, 'destroy'])->name('service.destroy');
        Route::put('/restore/{id}', [ServicesController::class, 'restore'])->name('service.restore');
        Route::put('/changeStatues/{id}', [ServicesController::class, 'changeStatues'])->name('service.changeStatues');
    });

    /**
    * ServiceProviders
    */
    Route::group(['prefix'=>'serviceProviders'], function() {
        Route::get('/', [ServiceProvidersController::class, 'index'])->name('serviceProvider.index');
        Route::get('/trashed', [ServiceProvidersController::class, 'trashed'])->name('serviceProvider.trashed');
        Route::get('/{id}', [ServiceProvidersController::class, 'show'])->name('serviceProvider.show');
        Route::post('/', [ServiceProvidersController::class, 'store'])->name('serviceProvider.store');
        Route::post('/{id}', [ServiceProvidersController::class, 'update'])->name('serviceProvider.update');
        Route::delete('/{id}', [ServiceProvidersController::class, 'destroy'])->name('serviceProvider.destroy');
        Route::put('/restore/{id}', [ServiceProvidersController::class, 'restore'])->name('serviceProvider.restore');
        Route::put('/changeStatues/{id}', [ServiceProvidersController::class, 'changeStatues'])->name('serviceProvider.changeStatues');
    });

    /**
     * Users
     */
    Route::group(['prefix'=>'users'], function() {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::put('/changeStatues/{id}', [UserController::class, 'changeStatues'])->name('users.changeStatues');
    });
    
});

