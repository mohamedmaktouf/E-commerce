<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ADMIN API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your ADMIN API!
|
*/
Route::post('/login',[
    \App\Http\Controllers\Admin\AuthController::class,'login'
]);
Route::group(['middleware' => ['jwt.verify']],function ()
{
    Route::post('/lens',[
        \App\Http\Controllers\Admin\LensController::class,'create'
    ]);
    Route::post('/frame',[
        \App\Http\Controllers\Admin\FrameController::class,'create'
    ]);
});
