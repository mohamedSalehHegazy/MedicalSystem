<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'users'], function() {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::put('/changeStatues/{id}', [UserController::class, 'changeStatues'])->name('users.changeStatues');
});
