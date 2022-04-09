<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * AdminAuth
 */
Route::group(['prefix'=>'admin/auth'], function() {
    Route::post('/login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.auth.logout');

});
