<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('product', \App\Http\Controllers\ProductController::class)
                    ->middleware('auth:sanctum');

Route::apiResource('users', \App\Http\Controllers\UserController::class)
                    ->middleware('auth:sanctum');


Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);