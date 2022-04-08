<?php

use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'reservations'], function() {
    Route::get('/', [ReservationController::class, 'index'])->name('reservations.index');
    Route::put('/changeStatues/{id}', [ReservationController::class, 'changeStatues'])->name('reservations.changeStatues');
});
