<?php

use App\Http\Controllers\CrimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InmateController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('do-login', [UserController::class, 'doLogin'])->name('do.login');
// --loging korte hobe 
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {


    Route::get('/', [HomeController::class, 'home'])->name("Dashboard");
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/inmate', [InmateController::class, 'inmate'])->name("inmate");
    Route::get('/inmate_add', [InmateController::class, 'list'])->name("inmate_list");
    Route::post('/inmate_store', [InmateController::class, 'store'])->name("inmate_list_store");
    Route::get('/inmate/delete/{inmate_id}', [InmateController::class, 'deleteinmate'])->name('inmate.delete');
    Route::get('/inmate/view/{inmate_id}', [InmateController::class, 'viewinmate'])->name('inmate.view');
    Route::get('/inmate/edit/{inmate_id}', [InmateController::class, 'edit_inmate'])->name('inmate.edit');
    Route::put('/inmate/update/{inmate_id}', [InmateController::class, 'update_inmate'])->name('inmate.update');
});

//  for staff
Route::get('/staff', [StaffController::class, 'staff'])->name("staff");
Route::get('/staff/add', [StaffController::class, 'list'])->name("staff_add");
Route::post('/staff/store', [StaffController::class, 'store'])->name("staff_store");
Route::get('/staff/delete/{staff_id}',[StaffController::class,'delete_staff'])->name('delete.staff');
Route::get('/staff/view/{staff_id}',[StaffController::class,'view_staff'])->name("staff.view");
Route::get('/staff/edit/{staff_id}',[StaffController::class,'edit_staff'])->name("staff.edit");
Route::put('/staff/update/{staff_id}',[StaffController::class,'update_staff'])->name('update.staff');