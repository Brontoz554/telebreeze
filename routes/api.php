<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
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

//Route::resource('stuff', UserController::class);
Route::put('/user/{user}', [UserController::class, 'update']);
Route::get('/user/{user}', [UserController::class, 'show']);
Route::delete('/user/{user}', [UserController::class, 'remove']);
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);

Route::post('/job', [JobController::class, 'store']);
Route::get('/job/{job}', [JobController::class, 'show']);
Route::get('/job', [JobController::class, 'index']);
Route::put('/job/{job}', [JobController::class, 'update']);
Route::delete('/job/{job}', [JobController::class, 'remove']);

