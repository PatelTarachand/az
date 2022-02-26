<?php

use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\CommonController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\ApplyServiceController;
use App\Http\Controllers\api\SubCategoryController;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\api\PurchaseItemController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [UsersController::class, 'login']);

Route::post('sendOtp', [CommonController::class, 'sendOtp']);

Route::post('otpVerify', [CommonController::class, 'otpVerify']);


// Route::group(['middleware' => 'auth:sanctum'], function () {
    
Route::get('home', [HomeController::class, 'index']);

Route::get('fetch-profile', [HomeController::class, 'fetch_profile']);

Route::post('update-profile', [HomeController::class, 'update_profile']);

Route::get('category', [CategoryController::class, 'index']);

Route::post('subCategory', [SubCategoryController::class, 'index']);

Route::post('services', [ApplyServiceController::class, 'index']);

Route::post('apply_service', [ApplyServiceController::class, 'apply_service']);

Route::post('apply_service_edit', [ApplyServiceController::class, 'apply_service']);

Route::get('fetch_apply_service', [ApplyServiceController::class, 'fetch_apply_service']);

Route::post('fetch_items', [PurchaseItemController::class, 'fetch_items']);

Route::post('item_approve', [PurchaseItemController::class, 'item_status']);

Route::post('item_cancel', [PurchaseItemController::class, 'item_status']);

Route::post('service_complete', [PurchaseItemController::class, 'service_complete']);

// });


