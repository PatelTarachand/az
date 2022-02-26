<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ServicemanController;
use App\Http\Controllers\api\ApplyServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\AssignServiceController;
use App\Http\Controllers\ServiceManDashboardController;

Route::resource('category', CategoryController::class);
Route::resource('subCategory', SubCategoryController::class);
Route::get('fetch-sub-category',[SubCategoryController::class,'fetech_sub_category'])->name('fetech_sub_category');
Route::resource('packages', PackagesController::class);

Route::resource('serviceman', ServicemanController::class);
Route::resource('assignService', AssignServiceController::class);

Route::resource('services', ServiceController::class);
Route::get('delete-record', [CommonController::class, 'delete'])->name('deleteRecord');
Route::get('getSelect2Record', [CommonController::class, 'getSelect2Record']);
Route::get('getSelect2Record2', [CommonController::class, 'getSelect2Record2']);
Route::get('select-record', [CommonController::class, 'select_record']);
Route::get('assign-task', [ApplyServiceController::class,'assignTask'])->name('assignTask');

Route::get('/users', '\App\Http\Controllers\usersController@show');
Route::get('/getUsers', '\App\Http\Controllers\usersController@getUsers')->name('users.data');
Route::get('/user/blobked/{id}', '\App\Http\Controllers\usersController@blocked');
Route::get('/user/unblobked/{id}', '\App\Http\Controllers\usersController@unblobked');



?>