<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TestapiIntegrationController;
use App\Http\Controllers\API\AuthController;

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

Route::get('/api_integration',[TestapiIntegrationController::class,'index']);
Route::POST('/api_integration_apipost',[TestapiIntegrationController::class,'ApiPost']);

/**
 * 
 * auth register and login
 */
Route::post('/register',[AuthController::class,'Register']);
Route::post('/login',[AuthController::class,'login']);
