<?php

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
Route::post('/login',[
    \App\Http\Controllers\User\AuthController::class,'login'
]);
Route::get('/frame',[
    \App\Http\Controllers\User\FrameController::class,'getActiveFrames'
]);
Route::get('/lens',[
    \App\Http\Controllers\User\LensController::class,'getLenses'
]);
Route::group(['middleware' => ['jwt.verify']],function () {
    Route::post('/glass', [
        \App\Http\Controllers\User\GlassController::class, 'create'
    ]);
});

