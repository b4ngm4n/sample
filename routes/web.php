<?php

use App\Http\Controllers\Account\RoleController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data\KabupatenController;
use App\Http\Controllers\Data\KecamatanController;
use App\Http\Controllers\Data\KelurahanController;
use App\Http\Controllers\Data\ProvinsiController;
use App\Http\Controllers\Data\PuskesmasController;
use App\Http\Controllers\Data\JenisPelayananController;
use App\Http\Controllers\Data\PosPelayananController;
use App\Http\Controllers\Data\VaksinController;
use App\Http\Controllers\Database\TableController;
use App\Http\Controllers\Master\FaskesController;
use App\Http\Controllers\Master\WilayahController;
use App\Http\Controllers\PWSController;
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
    });



    // GROUPING WILAYAH
    // Route::group(['prefix' => 'wilayah'], function () {

        // Data Wilayah
        // Route::group(['prefix' => 'wilayah', 'as' => 'wilayah.'], function () {
        //     Route::get('/', [WilayahController::class, 'index'])->name('index')->middleware('permission:list-provinsi');
        //     Route::get('create', [WilayahController::class, 'create'])->name('create')->middleware('permission:create-provinsi');
        //     Route::post('store', [WilayahController::class, 'store'])->name('store')->middleware('permission:store-provinsi');
        //     Route::get('show/{provinsi}', [WilayahController::class, 'show'])->name('show')->middleware('permission:read-provinsi');
        //     Route::get('{provinsi}/edit', [WilayahController::class, 'edit'])->name('edit')->middleware('permission:edit-provinsi');
        //     Route::put('update/{provinsi}', [WilayahController::class, 'update'])->name('update')->middleware('permission:update-provinsi');
        //     Route::delete('destroy/{provinsi}', [WilayahController::class, 'destroy'])->name('destroy')->middleware('permission:delete-provinsi');
        // });

        // Data Kelurahan
        // Route::group(['prefix' => 'kelurahan', 'as' => 'kelurahan.'], function () {
        //     Route::get('/', [KelurahanController::class, 'index'])->name('index')->middleware('permission:list-kelurahan');
        //     Route::get('create', [KelurahanController::class, 'create'])->name('create')->middleware('permission:create-kelurahan');
        //     Route::post('store', [KelurahanController::class, 'store'])->name('store')->middleware('permission:store-kelurahan');
        //     Route::get('show/{kelurahan}', [KelurahanController::class, 'show'])->name('show')->middleware('permission:read-kelurahan');
        //     Route::get('edit/{kelurahan}', [KelurahanController::class, 'edit'])->name('edit')->middleware('permission:edit-kelurahan');
        //     Route::put('update/{kelurahan}', [KelurahanController::class, 'update'])->name('update')->middleware('permission:update-kelurahan');
        //     Route::delete('destroy/{kelurahan}', [KelurahanController::class, 'destroy'])->name('destroy')->middleware('permission:delete-kelurahan');
        // });
    // });
    // END GROUPING WILAYAH

    // GROUPING PELAYANAN
    // Route::group(['prefix' => 'pelayanan'], function () {

        // Data Puskesmas
        // Route::group(['prefix' => 'puskesmas', 'as' => 'puskesmas.'], function () {
        //     Route::get('/', [PuskesmasController::class, 'index'])->name('index')->middleware('permission:list-puskesmas');
        //     Route::get('create', [PuskesmasController::class, 'create'])->name('create')->middleware('permission:create-puskesmas');
        //     Route::post('store', [PuskesmasController::class, 'store'])->name('store')->middleware('permission:store-puskesmas');
        //     Route::get('show/{puskesmas}', [PuskesmasController::class, 'show'])->name('show')->middleware('permission:read-puskesmas');
        //     Route::get('edit/{puskesmas}', [PuskesmasController::class, 'edit'])->name('edit')->middleware('permission:edit-puskesmas');
        //     Route::put('update/{puskesmas}', [PuskesmasController::class, 'update'])->name('update')->middleware('permission:update-puskesmas');
        //     Route::delete('destroy/{puskesmas}', [PuskesmasController::class, 'destroy'])->name('destroy')->middleware('permission:delete-puskesmas');

        //     // Wilayah Kerja
        //     Route::post('puskesmas/{puskesmas}/wilayah-kerja', [PuskesmasController::class, 'wilayahKerja'])->name('wilayah-kerja')->middleware('permission:store-wilayah-kerja-puskesmas');
        // });
        // END Puskesmas

        // JENIS PELAYANAN
        // Route::group(['prefix' => 'jenis-pelayanan', 'as' => 'jenis-pelayanan.'], function () {
        //     Route::get('/', [JenisPelayananController::class, 'index'])->name('index')->middleware('permission:list-jenis-pelayanan');
        //     Route::get('create', [JenisPelayananController::class, 'create'])->name('create')->middleware('permission:create-jenis-pelayanan');
        //     Route::post('store', [JenisPelayananController::class, 'store'])->name('store')->middleware('permission:store-jenis-pelayanan');
        //     Route::get('show/{jenis_pelayanan}', [JenisPelayananController::class, 'show'])->name('show')->middleware('permission:read-jenis-pelayanan');
        //     Route::get('edit/{jenis_pelayanan}', [JenisPelayananController::class, 'edit'])->name('edit')->middleware('permission:edit-jenis-pelayanan');
        //     Route::put('update/{jenis_pelayanan}', [JenisPelayananController::class, 'update'])->name('update')->middleware('permission:update-jenis-pelayanan');
        //     Route::delete('destroy/{jenis_pelayanan}', [JenisPelayananController::class, 'destroy'])->name('destroy')->middleware('permission:delete-jenis-pelayanan');
        // });

        // VAKSIN
        // Route::group(['prefix' => 'vaksin', 'as' => 'vaksin.'], function () {
        //     Route::get('/', [VaksinController::class, 'index'])->name('index')->middleware('permission:list-vaksin');
        //     Route::get('create', [VaksinController::class, 'create'])->name('create')->middleware('permission:create-vaksin');
        //     Route::post('store', [VaksinController::class, 'store'])->name('store')->middleware('permission:store-vaksin');
        //     Route::get('show/{vaksin}', [VaksinController::class, 'show'])->name('show')->middleware('permission:read-vaksin');
        //     Route::get('edit/{vaksin}', [VaksinController::class, 'edit'])->name('edit')->middleware('permission:edit-vaksin');
        //     Route::put('update/{vaksin}', [VaksinController::class, 'update'])->name('update')->middleware('permission:update-vaksin');
        //     Route::delete('destroy/{vaksin}', [VaksinController::class, 'destroy'])->name('destroy')->middleware('permission:delete-vaksin');
        // });

        // // POS PELAYANAN
        // Route::group(['prefix' => 'pos-pelayanan', 'as' => 'pos-pelayanan.'], function () {
        //     Route::get('/', [PosPelayananController::class, 'index'])->name('index')->middleware('permission:list-pos-pelayanan');
        //     Route::get('create', [PosPelayananController::class, 'create'])->name('create')->middleware('permission:create-pos-pelayanan');
        //     Route::post('store', [PosPelayananController::class, 'store'])->name('store')->middleware('permission:store-pos-pelayanan');
        //     Route::get('show/{pos_pelayanan}', [PosPelayananController::class, 'show'])->name('show')->middleware('permission:read-pos-pelayanan');
        //     Route::get('edit/{pos_pelayanan}', [PosPelayananController::class, 'edit'])->name('edit')->middleware('permission:edit-pos-pelayanan');
        //     Route::put('update/{pos_pelayanan}', [PosPelayananController::class, 'update'])->name('update')->middleware('permission:update-pos-pelayanan');
        //     Route::delete('destroy/{pos_pelayanan}', [PosPelayananController::class, 'destroy'])->name('destroy')->middleware('permission:delete-pos-pelayanan');
        // });

    // });
    // END GROUPING PELAYANAN

    // IMUNISASI
    // Route::get('/pws', [PWSController::class, 'index'])->name('pws.index')->middleware('permission:list-pws');

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
