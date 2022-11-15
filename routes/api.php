<?php

use App\Http\Controllers\Apicontroller;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\BeritaApiController;
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
Route::get('/getTipe',[Apicontroller::class, 'getAllTipe']);
Route::post('/createtipe',[Apicontroller::class, 'createtipe']);
Route::get('/getOneTipe',[Apicontroller::class, 'getOneTipe']);
Route::delete('/deletetipe',[Apicontroller::class, 'delete']);
Route::post('/updatetipe',[Apicontroller::class, 'updatetipe']);


Route::get('/getberita',[BeritaApiController::class, 'getAllberita']);
Route::post('/createberita',[BeritaApiController::class, 'createberita']);
Route::get('/getOneberita',[BeritaApiController::class, 'getOneberita']);
Route::delete('/deleteberita',[BeritaApiController::class, 'delete']);
Route::post('/updateberita',[BeritaApiController::class, 'updateberita']);

Route::get('/getBeritaByuserId',[BeritaApiController::class, 'getBeritaByuserId']);


Route::post('/register',[AuthApiController::class, 'register']);
Route::post('/login',[AuthApiController::class, 'login']);
Route::post('/refresh',[AuthApiController::class, 'refresh']);
Route::post('/logout',[AuthApiController::class, 'logout']);
Route::post('/getme',[AuthApiController::class, 'getMe']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});