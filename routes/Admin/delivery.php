<?php

use App\Http\Controllers\Admin\DeliveryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'delivery'], function() {
    Route::get('/', [DeliveryController::class, 'index'])->name('delivery.index');
    Route::get('/{id}', [DeliveryController::class, 'show'])->name('delivery.show');
    Route::post('/', [DeliveryController::class, 'store'])->name('delivery.store');
    Route::put('/{id}', [DeliveryController::class, 'update'])->name('delivery.update');
    Route::delete('/{id}', [DeliveryController::class, 'destroy'])->name('delivery.destroy');
    Route::put('/restore/{id}', [DeliveryController::class, 'restore'])->name('delivery.restore');
    Route::put('/changeStatues/{id}', [DeliveryController::class, 'changeStatues'])->name('delivery.changeStatues');
});
