<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'categories'], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::put('/changeStatues/{id}', [CategoryController::class, 'changeStatues'])->name('categories.changeStatues');
    Route::put('/changeDeliveryStatues/{id}', [CategoryController::class, 'changeDeliveryStatues'])->name('categories.changeDeliveryStatues');
});
