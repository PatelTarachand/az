<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ServiceManDashboardController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('emp_login', [ServiceManDashboardController::class, 'sLogin']);
Route::get('test', [ServiceManDashboardController::class, 'test']);



// Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('emp_home', [ServiceManDashboardController::class, 'index']);
     Route::post('add_item', [ServiceManDashboardController::class, 'add_item']);
        Route::post('fetch_items', [ServiceManDashboardController::class, 'fetch_items']);

// });


?>