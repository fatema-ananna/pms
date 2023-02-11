<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InmateController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "home"])->name("admin");

Route::get('/inmate',[InmateController::class, "inmate"])->name("inmate");
Route::get('/inmate_add',[InmateController::class, "list"])->name("inmate_list");
Route::post('/inmate_store',[InmateController::class, "store"])->name("inmate_list_store");
Route::get('/inmate/delete/{inmate_id}', [InmateController::class, 'deleteinmate'])->name('inmate.delete');
Route::get('/inmate/view/{inmate_id}', [InmateController::class, 'viewinmate'])->name('inmate.view');
Route::get('/inmate/edit/{inmate_id}', [InmateController::class, 'edit_inmate'])->name('inmate.edit');
Route::put('/inmate/update/{inmate_id}', [InmateController::class, 'update_inmate'])->name('inmate.update');