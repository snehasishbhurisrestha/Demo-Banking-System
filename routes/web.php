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

Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/about', function () { return view('site.about');})->name('about');
Route::get('/business', function () { return view('site.business');})->name('business');
Route::get('/wealth', function () { return view('site.wealth');})->name('wealth');
Route::get('/insights', function () { return view('site.insights');})->name('insights');
Route::get('/carrers', function () { return view('site.carrers');})->name('carrers');
Route::get('/contact-us', function () { return view('site.contact');})->name('contact');
Route::get('/leadership', function () { return view('site.leadership');})->name('leadership');
Route::get('/our-story', function () { return view('site.story');})->name('story');
Route::get('/creditcards', function () { return view('site.creditcards');})->name('creditcards');
Route::get('/estate-planning', function () { return view('site.estate_planning');})->name('estate-planning');
Route::get('/trust', function () { return view('site.trust');})->name('trust');
Route::get('/invesment', function () { return view('site.invesment');})->name('invesment');
Route::get('/private-banking', function () { return view('site.privateBanking');})->name('privateBanking');
Route::get('/markets', function () { return view('site.markets');})->name('markets');
Route::get('/saving', function () { return view('site.saving');})->name('saving');
Route::get('/lending', function () { return view('site.lending');})->name('lending');
Route::get('/treasury', function () { return view('site.treasury');})->name('treasury');
Route::get('/commercial', function () { return view('site.commercial');})->name('commercial');


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
