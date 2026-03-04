<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\{
    RoleController,
    PermissionController,
    AgentsController,
    CustomerController,
    AccountController
};

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[DashboardController::class,'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::controller(RoleController::class)->group(function () {
        Route::prefix('role')->group(function () {
            Route::get("/",'roles')->name('roles');
            Route::post("/create-role",'create_role')->name('role.create');
            Route::post("{roleId?}/update-role",'update_role')->name('role.update');
            Route::delete("/{roleId}/destroy-role",'destroy_role')->name('role.destroy');
            Route::get("/{roleId}/add-permission-to-role",'addPermissionToRole')->name('role.addPermissionToRole');
            Route::post("/{roleId}/give-permissions",'givePermissionToRole')->name('role.give-permissions');
        });
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::prefix('permission')->group(function () {
            Route::get("/",'permission')->name('permission');
            Route::post("/create-permission",'create_permission')->name('permission.create');
            Route::post("{permissionId?}/update-permission",'update_permission')->name('permission.update');
            Route::delete("/{permissionId}/destroy-permission",'destroy_permission')->name('permission.destroy');
        });
    });

    Route::controller(AccountController::class)->group(function () {
        Route::prefix('account')->group(function () {
            Route::get('/transactions/{user_id}','transactions')->name('transactions');
            Route::get('/deposit','depositView')->name('deposit.view');
            Route::get('/withdraw','withdrawView')->name('withdraw.view');
            Route::post('/deposit', 'deposit')->name('deposit');
            Route::post('/withdraw', 'withdraw')->name('withdraw');
        });
    });

    Route::resource('agents', AgentsController::class);
    Route::resource('customers', CustomerController::class);
});

require __DIR__.'/auth.php';
