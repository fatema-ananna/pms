<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\CrimeController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\VisitorController as FrontendVisitorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InmateController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Police_CaseController;
use App\Http\Controllers\PunishmentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SslCommerzPaymentController;
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
Route::group(['middleware' => ['localization', 'auth'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => 'checkAdmin'], function () {

        Route::get('/', [HomeController::class, 'home'])->name("Dashboard");
        Route::get('/switch-lang/{lang}', [HomeController::class, 'changeLanguage'])->name('switch.lang');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/users', [UserController::class, 'list'])->name('admin.users');
        Route::get('/create/user', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

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



        // for police station
        Route::get('/station', [StationController::class, 'station'])->name("station");
        Route::get('/station/list', [StationController::class, 'list'])->name("list");
        Route::post('/station/list/store', [StationController::class, 'station_store'])->name("store");
        Route::get('/station/edit/{station_id}', [StationController::class, 'edit_station'])->name("station.edit");
        Route::put('/station/update/{station_id}', [StationController::class, 'update_station'])->name('update.station');
   
        // for crime...
        Route::get('/crime', [CrimeController::class, 'crime'])->name("crime");
        Route::get('/crime/list', [CrimeController::class, 'list'])->name("crime_list");
        Route::post('/crime/list/store', [CrimeController::class, 'store'])->name("crime_store");
        Route::get('/crime/{id}', [CrimeController::class, 'edit'])->name("crime.edit");

        Route::put('/crime/update/{id}', [CrimeController::class, 'update'])->name("crime.update");

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
        // for cell
        Route::get('/cell', [CellController::class, 'cell'])->name("cell");
        Route::get('/cell/add', [CellController::class, 'list'])->name("cell_list");
        Route::post('/cell/store', [CellController::class, 'store'])->name("cell_store");
        Route::post("/get-cells", [CellController::class, 'getCells'])->name("get.cells");
        Route::get('/cell/edit/{id}', [CellController::class, 'edit'])->name("cell.edit");
        Route::put('/cell/update/{id}', [CellController::class, 'update'])->name("cell.update");

        // // for activity
        Route::get('/activity', [ActivityController::class, 'activity'])->name("activity");
        Route::get('/activity/add', [ActivityController::class, 'list'])->name("activity_list");
        Route::post('/activity/store', [ActivityController::class, 'store'])->name("activity_store");
        Route::get('/activity/edit/{id}', [ActivityController::class, 'edit'])->name("activity.edit");
        Route::put('/activity/update/{id}', [ActivityController::class, 'update'])->name("activity.update");
        //for punishment
        Route::get('/punishment', [PunishmentController::class, 'punishment'])->name("punishment");
        Route::get('/punishment/add', [PunishmentController::class, 'list'])->name("punishment_list");
        Route::post('/punishment/store', [PunishmentController::class, 'store'])->name("punishment_store");
        Route::get('/punishment/edit/{id}', [PunishmentController::class, 'edit'])->name("punishment.edit");
        Route::put('/punishment/update/{id}', [PunishmentController::class, 'update'])->name("punishment.update");
        //for reports
        Route::get('/reports', [ReportController::class, 'reports'])->name("reports");
        //for gallery
        Route::get('/gallery', [HomeController::class, 'gallery'])->name("gallery");
        Route::get('/gallery/add', [HomeController::class, 'form'])->name("gallery.form");
        Route::post('/gallery/store', [HomeController::class, 'picture_store'])->name("picture.store");
        Route::get('/gallery/edit/{id}', [HomeController::class, 'edit'])->name("pic.edit");
        Route::post('/gallery/update/{id}', [HomeController::class, 'update'])->name("gallery.update");
        //for notice
        Route::get('/notice', [NoticeController::class, 'notice'])->name("notice");
        Route::get('/notice/form', [NoticeController::class, 'form'])->name("notice.form");
        Route::post('/notice/form/store', [NoticeController::class, 'store'])->name("notice.store");
        Route::get('/notice/edit/{id}', [NoticeController::class, 'edit'])->name("notice.edit");
        Route::put('/notice/update/{id}', [NoticeController::class, 'update'])->name("notice.update");
        Route::get('/notice/delete/{id}', [NoticeController::class, 'delete'])->name('notice.delete');
        Route::resource('/roles', RoleController::class);

        Route::get('/role/assign/{id}', [RoleController::class, 'showPermissions'])->name('role.assign');
        Route::get('/permissions', [PermissionController::class, 'list'])->name('permission.list');
        Route::post('/permissions-assign/{role_id}', [RoleController::class, 'assignPermissions'])->name('permissions.assign');
        //payment

        Route::get('/payment', [PaymentController::class, 'payment'])->name('backend.payment');
    });
});
// frontend


Route::get('/', [FrontendHomeController::class, 'home'])->name("home");
Route::get('/registration', [FrontendHomeController::class, 'list'])->name("user.registration");
Route::post('/registration/store', [FrontendHomeController::class, 'store'])->name("user.registration.store");
Route::get('/login/auth', [FrontendHomeController::class, 'login'])->name('frontend.login');
Route::post('/do-login/auth', [FrontendHomeController::class, 'doLogin'])->name('frontend.do.login');
Route::get('/logout/auth', [FrontendHomeController::class, 'logout'])->name('frontend.logout');
Route::get('/visitor/dashboard', [FrontendVisitorController::class, 'visitor'])->name('frontend.visitor');

Route::get('/visitor/edit/{id}', [FrontendVisitorController::class, 'edit'])->name('frontend.visitor.edit');
Route::post('/visitor/update/{id}', [FrontendVisitorController::class, 'update'])->name('frontend.visitor.update');
Route::get('/visitor/appointment', [FrontendVisitorController::class, 'appointment'])->name('frontend.visitor.appointment');
Route::get('/visitor/appointment/form', [FrontendVisitorController::class, 'form'])->name("appointment.form");
Route::post('/visitor/list/store', [FrontendVisitorController::class, 'visitor_store'])->name("visitor_list_store");
Route::post('/visitor/status/{id}', [FrontendVisitorController::class, 'visitor_status'])->name("visitor.status");
//payment
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay.now');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
Route::get('/payment', [FrontendVisitorController::class, 'paymentForm'])->name('payment.form');
Route::post("/get-activities", [ActivityController::class, "getActivities"])->name("get.activites");
