<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InmateController;
use App\Http\Controllers\Police_CaseController;
use App\Http\Controllers\PunishmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\WardController;
use Illuminate\Support\Facades\Route;


Route::get("/", function () {
    return to_route("Dashboard");
});
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('do-login', [UserController::class, 'doLogin'])->name('do.login');
// --loging korte hobe 
Route::group(['middleware' => ['localization','auth'], 'prefix' => 'admin'], function () {


    Route::get('/', [HomeController::class, 'home'])->name("Dashboard");
    Route::get('/switch-lang/{lang}', [HomeController::class, 'changeLanguage'])->name('switch.lang');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // for inmate
    Route::get('/inmate', [InmateController::class, 'inmate'])->name("inmate");
    Route::get('/inmate_add', [InmateController::class, 'list'])->name("inmate_list");
    Route::post('/inmate_store', [InmateController::class, 'store'])->name("inmate_list_store");
    Route::get('/inmate/delete/{inmate_id}', [InmateController::class, 'deleteinmate'])->name('inmate.delete');
    Route::get('/inmate/view/{inmate_id}', [InmateController::class, 'viewinmate'])->name('inmate.view');
    Route::get('/inmate/edit/{inmate_id}', [InmateController::class, 'edit_inmate'])->name('inmate.edit');
    Route::put('/inmate/update/{inmate_id}', [InmateController::class, 'update_inmate'])->name('inmate.update');


    //  for staff
    Route::get('/staff', [StaffController::class, 'staff'])->name("staff");
    Route::get('/staff/add', [StaffController::class, 'list'])->name("staff_add");
    Route::post('/staff/store', [StaffController::class, 'store'])->name("staff_store");
    Route::get('/staff/delete/{staff_id}', [StaffController::class, 'delete_staff'])->name('delete.staff');
    Route::get('/staff/view/{staff_id}', [StaffController::class, 'view_staff'])->name("staff.view");
    Route::get('/staff/edit/{staff_id}', [StaffController::class, 'edit_staff'])->name("staff.edit");
    Route::put('/staff/update/{staff_id}', [StaffController::class, 'update_staff'])->name('update.staff');

    // for visitor
    Route::get('/visitor', [VisitorController::class, 'visitor'])->name("visitor");
    Route::get('/visitor/add', [VisitorController::class, 'list'])->name("visitor.add");

    // for police station
    Route::get('/station', [StationController::class, 'station'])->name("station");
    Route::get('/station/list', [StationController::class, 'list'])->name("list");
    Route::post('/station/list/store', [StationController::class, 'station_store'])->name("store");
    Route::get('/station/edit/{station_id}', [StationController::class, 'edit_station'])->name("station.edit");
    Route::put('/station/update/{station_id}', [StationController::class, 'update_station'])->name('update.station');
    Route::get('/station/view/{station_id}', [StationController::class, 'view_station'])->name("station.view");
    // for crime...
    Route::get('/crime', [CrimeController::class, 'crime'])->name("crime");
    Route::get('/crime/list', [CrimeController::class, 'list'])->name("crime_list");
    Route::post('/crime/list/store', [CrimeController::class, 'store'])->name("crime_store");

    // for case
    Route::get('/case', [Police_CaseController::class, 'case'])->name("case");
    Route::get('/case/add/{id}', [Police_CaseController::class, 'list'])->name("case_list");
    Route::post('/case/add/store', [Police_CaseController::class, 'store'])->name("case_store");
    Route::get('/case/view/{id}', [Police_CaseController::class, 'view'])->name("case_view");
    // for ward
    Route::get('/ward', [WardController::class, 'ward'])->name("ward");
    Route::get('/ward/add', [WardController::class, 'list'])->name("ward_list");
    Route::post('/ward/store', [WardController::class, 'store'])->name("ward_store");
    Route::get('/ward/edit/{ward_id}', [WardController::class, 'edit'])->name("ward_edit");
    Route::put('/ward/update/{ward_id}', [WardController::class, 'update'])->name("ward_update");

    // // for activity
    Route::get('/activity', [ActivityController::class, 'activity'])->name("activity");
    Route::get('/activity/add', [ActivityController::class, 'list'])->name("activity_list");
    Route::post('/activity/store', [ActivityController::class, 'store'])->name("activity_store");

    Route::get('/punishment', [PunishmentController::class, 'punishment'])->name("punishment");
    Route::get('/punishment/add', [PunishmentController::class, 'list'])->name("punishment_list");
    Route::post('/punishment/store', [PunishmentController::class, 'store'])->name("punishment_store");
});
