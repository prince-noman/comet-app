<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;
use Illuminate\Support\Facades\Route;

//admin auth routes
Route::group( ['middleware' => 'admin.redirect'], function () {
    Route::get( '/admin-login', [AdminAuthController::class, 'showLoginPage'] )->name( 'admin.login.page' );
    Route::post( '/admin-login', [AdminAuthController::class, 'login'] )->name( 'admin.login' );
} );

//admin page routes
Route::group( ['middleware' => 'admin'], function () {
    Route::get( '/dashboard', [AdminPageController::class, 'showDashboard'] )->name( 'admin.dashboard' );
    Route::get( '/admin-logout', [AdminAuthController::class, 'logout'] )->name( 'admin.logout' );
} );