<?php

use App\Http\Controllers\Account\RoleController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data\PWSController;
use App\Http\Controllers\Data\PwsSasaranController;
use App\Http\Controllers\Database\TableController;
use App\Http\Controllers\Master\FaskesController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\VaksinController;
use App\Http\Controllers\Master\WilayahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('permission:home-care');

Route::group(['middleware' => 'guest', 'prefix' => 'auth'], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'storeLogin'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register/submit', [RegisterController::class, 'storeRegister'])->name('register.store');

    Route::get('reset-password', [ResetPasswordController::class, 'reset'])->name('reset-password');
    Route::post('reset-password/submit', [ResetPasswordController::class, 'storeReset'])->name('reset-password.store');
});

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

    Route::match(['get', 'post'], '/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('permission:dashboard');

    // Data Wilayah
    Route::group(['prefix' => 'wilayah', 'as' => 'wilayah.'], function () {
        Route::get('/', [WilayahController::class, 'index'])->name('index')->middleware('permission:list-wilayah');
        Route::get('/create', [WilayahController::class, 'create'])->name('create')->middleware('permission:create-wilayah');
        Route::post('/store', [WilayahController::class, 'store'])->name('store')->middleware('permission:store-wilayah');
        Route::get('/{wilayah}', [WilayahController::class, 'show'])->name('show')->middleware('permission:read-wilayah');
        Route::get('/{wilayah}/edit', [WilayahController::class, 'edit'])->name('edit')->middleware('permission:edit-wilayah');
        Route::put('{wilayah}', [WilayahController::class, 'update'])->name('update')->middleware('permission:update-wilayah');
        Route::delete('{wilayah}', [WilayahController::class, 'destroy'])->name('destroy')->middleware('permission:delete-wilayah');
    });

    // Data Faskes
    Route::group(['prefix' => 'faskes', 'as' => 'faskes.'], function () {
        Route::get('/', [FaskesController::class, 'index'])->name('index')->middleware('permission:list-faskes');
        Route::get('/create', [FaskesController::class, 'create'])->name('create')->middleware('permission:create-faskes');
        Route::post('/store', [FaskesController::class, 'store'])->name('store')->middleware('permission:store-faskes');
        Route::get('/{faskes}', [FaskesController::class, 'show'])->name('show')->middleware('permission:read-faskes');
        Route::get('/{faskes}/edit', [FaskesController::class, 'edit'])->name('edit')->middleware('permission:edit-faskes');
        Route::put('{faskes}', [FaskesController::class, 'update'])->name('update')->middleware('permission:update-faskes');
        Route::delete('{faskes}', [FaskesController::class, 'destroy'])->name('destroy')->middleware('permission:delete-faskes');

        Route::post('{faskes}/wilayah-kerja', [FaskesController::class, 'wilayahKerja'])->name('wilayah-kerja')->middleware('permission:store-wilayah-kerja');

        Route::delete('{faskes}/wilayah-kerja/{wilayah}', [FaskesController::class, 'destroyWilayahKerja'])->name('destroy-wilayah-kerja')->middleware('permission:delete-wilayah-kerja');
    });

    Route::group(['prefix' => 'kategori', 'as' => 'kategori.'], function () {
        Route::get('/', [KategoriController::class, 'index'])->name('index')->middleware('permission:list-kategori');
        Route::get('/create', [KategoriController::class, 'create'])->name('create')->middleware('permission:create-kategori');
        Route::post('/store', [KategoriController::class, 'store'])->name('store')->middleware('permission:store-kategori');
        Route::get('/{kategori}/edit', [KategoriController::class, 'edit'])->name('edit')->middleware('permission:edit-kategori');
        Route::put('{kategori}', [KategoriController::class, 'update'])->name('update')->middleware('permission:update-kategori');
        Route::delete('{kategori}', [KategoriController::class, 'destroy'])->name('destroy')->middleware('permission:delete-kategori');
    }); 

    Route::group(['prefix' => 'vaksin', 'as' => 'vaksin.'], function () {
        Route::get('/', [VaksinController::class, 'index'])->name('index')->middleware('permission:list-vaksin');
        Route::get('/create', [VaksinController::class, 'create'])->name('create')->middleware('permission:create-vaksin');
        Route::post('/store', [VaksinController::class, 'store'])->name('store')->middleware('permission:store-vaksin');
        Route::get('/{vaksin}', [VaksinController::class, 'show'])->name('show')->middleware('permission:read-vaksin');
        Route::get('/{vaksin}/edit', [VaksinController::class, 'edit'])->name('edit')->middleware('permission:edit-vaksin');
        Route::put('{vaksin}', [VaksinController::class, 'update'])->name('update')->middleware('permission:update-vaksin');
        Route::delete('{vaksin}', [VaksinController::class, 'destroy'])->name('destroy')->middleware('permission:delete-vaksin');

        // Stok Vaksin
        Route::post('{vaksin}/stok', [VaksinController::class, 'storeStokVaksin'])->name('store-stok-vaksin')->middleware('permission:store-stok-vaksin');
        Route::delete('{vaksin}/stok/{stok}', [VaksinController::class, 'destroyStokVaksin'])->name('destroy-stok-vaksin')->middleware('permission:delete-stok-vaksin');

        // Kategori
        Route::post('{vaksin}/kategori', [VaksinController::class, 'storeKategoriVaksin'])->name('store-kategori-vaksin')->middleware('permission:store-kategori-vaksin');
        Route::delete('{vaksin}/kategori/{kategori}', [VaksinController::class, 'destroyKategoriVaksin'])->name('destroy-kategori-vaksin')->middleware('permission:delete-kategori-vaksin');
    });

    Route::group(['prefix' => 'pws', 'as' => 'pws.'], function () {
        Route::get('/imunisasi-bayi', [PWSController::class, 'getImunisasiBayi'])->name('imunisasi-bayi')->middleware('permission:list-pws-imunisasi-bayi');
        Route::get('/imunisasi-baduta', [PWSController::class, 'getImunisasiBaduta'])->name('imunisasi-baduta')->middleware('permission:list-pws-imunisasi-baduta');
        Route::get('/imunisasi-wus-ibu-hamil', [PWSController::class, 'getImunisasiWUSIbuHamil'])->name('imunisasi-wus-ibu-hamil')->middleware('permission:list-pws-imunisasi-wus-ibu-hamil');
        Route::get('/imunisasi-wus-tidak-hamil', [PWSController::class, 'getImunisasiWUSTidakHamil'])->name('imunisasi-wus-tidak-hamil')->middleware('permission:list-pws-imunisasi-wus-tidak-hamil');

        Route::post('imunisasi-bayi', [PWSController::class, 'storeImunisasiBayi'])->name('imunisasi-bayi')->middleware('permission:store-pws-imunisasi-bayi');
        Route::post('imunisasi-baduta', [PWSController::class, 'storeImunisasiBaduta'])->name('imunisasi-baduta')->middleware('permission:store-pws-imunisasi-baduta');
        Route::post('imunisasi-wus-ibu-hamil', [PWSController::class, 'storeImunisasiWUSIbuHamil'])->name('imunisasi-wus-ibu-hamil')->middleware('permission:store-pws-imunisasi-wus-ibu-hamil');
        Route::post('imunisasi-wus-tidak-hamil', [PWSController::class, 'storeImunisasiWUSTidakHamil'])->name('imunisasi-wus-tidak-hamil')->middleware('permission:store-pws-imunisasi-wus-tidak-hamil');

        Route::get('sasaran', [PwsSasaranController::class, 'index'])->name('sasaran')->middleware('permission:list-pws-sasaran');
        Route::post('sasaran', [PwsSasaranController::class, 'store'])->name('sasaran')->middleware('permission:store-pws-sasaran');
    });

    // GROUPING ACCOUNT
    Route::group(['prefix' => 'accounts'], function () {

        // User
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:list-user');
            Route::get('create', [UserController::class, 'create'])->name('create')->middleware('permission:create-user');
            Route::post('store', [UserController::class, 'store'])->name('store')->middleware('permission:store-user');
            Route::get('show/{user}', [UserController::class, 'show'])->name('show')->middleware('permission:read-user');
            Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit')->middleware('permission:edit-user');
            Route::put('update/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:update-user');
            Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:delete-user');

            // Permisison User
            Route::get('permissions/{user}', [UserController::class, 'listPermissions'])->name('permissions')->middleware('permission:list-user-permissions');
            Route::post('permissions/{user}', [UserController::class, 'storePermissions'])->name('permissions')->middleware('permission:store-user-permissions');

            // Assign Role to User
            Route::post('/roles/{user}', [UserController::class, 'assignRoles'])->name('roles')->middleware('permission:store-user-role');

            // Assign Permissions to User
            // Route::post('/users/{id}/assign-permissions', [UserController::class, 'assignPermissions'])->name('users.assign-permissions')->;
        });

        // Role
        Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
            Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:list-role');
            Route::get('create', [RoleController::class, 'create'])->name('create')->middleware('permission:create-role');
            Route::post('store', [RoleController::class, 'store'])->name('store')->middleware('permission:store-role');
            Route::get('show/{role}', [RoleController::class, 'show'])->name('show')->middleware('permission:read-role');
            Route::get('edit/{role}', [RoleController::class, 'edit'])->name('edit')->middleware('permission:edit-role');
            Route::put('update/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:update-role');
            Route::delete('destroy/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:delete-role');

            // Store Permission Role
            Route::post('permissions/{role}', [RoleController::class, 'permissions'])->name('permissions')->middleware('permission:store-role-permissions');
        });
    });
    // END GROUPING ACCOUNT

    Route::group(['prefix' => 'database'], function () {
        Route::get('/table', [TableController::class, 'index'])->name('table.index')->middleware('permission:list-table');
    });
});
