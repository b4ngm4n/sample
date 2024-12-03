<?php

use App\Http\Controllers\Account\RoleController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('permission:home-care');

Route::group(['middleware' => 'guest'],function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'storeLogin'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register/submit', [RegisterController::class, 'storeRegister'])->name('register.store');

    Route::get('reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password');
    Route::post('reset-password/submit', [ResetPasswordController::class, 'storeReset'])->name('reset-password.store');
});

Route::group(['middleware' => 'auth','prefix' => 'dashboard'],function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard');


    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:list-user');
        Route::get('create', [UserController::class, 'create'])->name('create')->middleware('permission:create-user');
        Route::post('store', [UserController::class, 'store'])->name('store')->middleware('permission:store-user');
        Route::get('show/{user}', [UserController::class, 'show'])->name('show')->middleware('permission:read-user');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit')->middleware('permission:edit-user');
        Route::post('update/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:update-user');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:delete-user');
    });

    Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:list-role');
        Route::get('create', [RoleController::class, 'create'])->name('create')->middleware('permission:create-role');
        Route::post('store', [RoleController::class, 'store'])->name('store')->middleware('permission:store-role');
        Route::get('show/{role}', [RoleController::class, 'show'])->name('show')->middleware('permission:read-role');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('edit')->middleware('permission:edit-role');
        Route::post('update/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:update-role');
        Route::get('destroy/{id}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:delete-role');
    });
});