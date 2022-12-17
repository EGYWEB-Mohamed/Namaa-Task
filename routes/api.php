<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\SubscriberController;
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

Route::apiResource('subscriber', SubscriberController::class);
Route::apiResource('blog', BlogController::class);
