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
use App\Http\Controllers\AssignServiceController;
use App\Http\Controllers\ServiceManDashboardController;

Route::get('/admin',[AdminController::class,'index'])->name('admin');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//website

Route::get('/',[WebsiteController::class,'index'])->name('index');
Route::get('/contact-us',[WebsiteController::class,'contactus'])->name('contactus');
Route::get('/about-us',[WebsiteController::class,'aboutus'])->name('aboutus');
Route::get('/user-login',[WebsiteController::class,'userLogin'])->name('userLogin');
Route::post('/user-login-submit',[WebsiteController::class,'userLoginSubmit'])->name('userLoginSubmit');
Route::get('/user-otp-form',[WebsiteController::class,'userOtpForm']);
Route::post('/user-otp',[WebsiteController::class,'userOtp'])->name('userOtp');
Route::post('/user-otp-submit',[WebsiteController::class,'userOtpSubmit'])->name('userOtpSubmit');
Route::get('/user-home',[WebsiteController::class,'userHome']);


//employee login

Route::get('/emp-login',[ServiceManDashboardController::class,'loginForm'])->name('emplogin');
Route::post('/emp-login',[ServiceManDashboardController::class,'loginSubmit'])->name('loginSubmit');
Route::get('/emp-home',[ServiceManDashboardController::class,'empHome'])->name('empHome');
Route::get('/emp-assign-services-details/{id}',[ServiceManDashboardController::class,'empApplyServicesDetails'])->name('empApplyServicesDetails');