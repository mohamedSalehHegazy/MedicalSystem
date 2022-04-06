<?php

use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'service'], function() {
    Route::get('/', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/{id}', [ServiceController::class, 'show'])->name('service.show');
    Route::post('/', [ServiceController::class, 'store'])->name('service.store');
    Route::post('/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::put('/restore/{id}', [ServiceController::class, 'restore'])->name('service.restore');
    Route::put('/changeStatues/{id}', [ServiceController::class, 'changeStatues'])->name('service.changeStatues');
});
