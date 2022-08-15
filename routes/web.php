<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
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

    //permission routes
    Route::resource( '/permission', PermissionController::class );

    //role routes
    Route::resource( '/role', RoleController::class );

    //user routes
    Route::resource( '/admin-user', AdminController::class );
    Route::get( '/admin-user-status-update/{id}', [AdminController::class, 'updateStatus'] )->name( 'admin.status.update' );
} );