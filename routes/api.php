<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StaffController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('stuff', StaffController::class);
Route::put('/staff/{staff}', [StaffController::class, 'update']);
Route::get('/staff/{staff}', [StaffController::class, 'show']);
Route::delete('/staff/{staff}', [StaffController::class, 'remove']);
Route::get('/staff', [StaffController::class, 'index']);
Route::post('/staff', [StaffController::class, 'store']);

Route::post('/fluff', [PostController::class, 'store']);

//Route::put('stuff/{stuff}', [StaffController::class, 'update']);
