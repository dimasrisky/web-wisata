<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\WisataApiController;
use App\Http\Controllers\Api\KotaApiController;
use App\Http\Controllers\Api\LoginApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/createtoken', [LoginApi::class, 'createToken']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::apiResource('users', UserApiController::class)->parameter('users', 'idUser')->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::apiResource('wisatas', WisataApiController::class)->parameter('wisatas', 'idWisata')->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::apiResource('kotas', KotaApiController::class)->parameter('kotas', 'idKota')->only(['index', 'show', 'store', 'update', 'destroy']);
});