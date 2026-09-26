<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BusStaffDetails;
use App\Http\Controllers\DocumentController;
use App\Mail\documentUpdate;



Route::get('/clear-all', function () {
    Artisan::call('optimize:clear');
    return redirect()->back();
});

Route::controller(adminController::class)->group(function(){
    Route::post('/authenticate', 'authenticate')->name('vehicle.authenticate');
    Route::get('/login', 'login')->name('vehicle.login');
    Route::get('/logout', 'logout')->name('vehicle.logout');
    Route::get('/', 'index')->name('vehicle.index')->middleware('noAccess');
    Route::get('/send-mail', 'sendMail')->name('vehicle.sendMail')->middleware('noAccess');
    Route::get('/checkExpiry', 'checkExpiry')->middleware('noAccess');
});

Route::resource('/busStaffDetails', BusStaffDetails::class)->middleware('noAccess');
Route::resource('/documents', DocumentController::class)->middleware('noAccess');

