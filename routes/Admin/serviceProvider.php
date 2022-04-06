<?php

use App\Http\Controllers\Admin\ServiceProviderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'serviceProvider'], function() {
    Route::get('/', [ServiceProviderController::class, 'index'])->name('serviceProvider.index');
    Route::get('/{id}', [ServiceProviderController::class, 'show'])->name('serviceProvider.show');
    Route::post('/', [ServiceProviderController::class, 'store'])->name('serviceProvider.store');
    Route::post('/{id}', [ServiceProviderController::class, 'update'])->name('serviceProvider.update');
    Route::delete('/{id}', [ServiceProviderController::class, 'destroy'])->name('serviceProvider.destroy');
    Route::put('/restore/{id}', [ServiceProviderController::class, 'restore'])->name('serviceProvider.restore');
    Route::put('/changeStatues/{id}', [ServiceProviderController::class, 'changeStatues'])->name('serviceProvider.changeStatues');
});
