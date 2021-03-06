<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ServicemanController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\ServiceManDashboardController;
use App\Http\Controllers\PaytmController;

//User Dashboard
Route::get('/user-dashboard',[UserDashboard::class,'userDashboard'])->name('userDashboard');
Route::get('/user-history',[UserDashboard::class,'history'])->name('history');
Route::get('/apply-services',[UserDashboard::class,'applyServices'])->name('applyServices');
Route::get('/apply-services-details/{id}',[UserDashboard::class,'applyServicesDetails'])->name('applyServicesDetails');
Route::get('/item-action/{id}/{status}',[UserDashboard::class,'ItemAction'])->name('ItemAction');
Route::get('/user-profile',[UserDashboard::class,'profile'])->name('profile');
Route::get('/sub-category/{id}',[UserDashboard::class,'getSubcatery'])->name('getSubcatery');
Route::get('/add-service/{id}',[UserDashboard::class,'addService'])->name('addService');

Route::post('add-service',[UserDashboard::class,'userServiceSubmit'])->name('userServiceSubmit');
Route::get('/user-logout',[UserDashboard::class,'userLogout'])->name('userLogout');
Route::post('user-profile-update', [UserDashboard::class, 'user_profile_update'])->name('user-profile-update');
<<<<<<< HEAD
=======

//User Dashboard
Route::get('/service-dashboard',[ServiceManDashboardController::class,'index'])->name('serviceDashboarad');
Route::get('/service-details',[ServiceManDashboardController::class,'serviceDetails'])->name('serviceDetails');
Route::get('/profile',[ServiceManDashboardController::class,'profile'])->name('serviceManProfile');
Route::get('/service-man-logout',[ServiceManDashboardController::class,'logout'])->name('serviceManLogout');


// PAYTM API

Route::get('/initiate',[PaytmController::class, 'initiate'])->name('initiate.payment');

Route::post('/payment',[PaytmController::class, 'pay'])->name('make.payment');

Route::post('/payment/status', [PaytmController::class, 'paymentCallback'])->name('status');

Route::get('/payment', [PaytmController::class, 'initiate']);
>>>>>>> 4363220797c2ce87aba1cbc984921358662ba0c9
