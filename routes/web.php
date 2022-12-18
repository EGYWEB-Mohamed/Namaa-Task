<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Front\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
]);
Route::get('/subscriber/login',[AuthController::class,'showForm'])->name('subscriber.login');
Route::post('/subscriber/login',[AuthController::class,'login']);
Route::post('/subscriber/logout',[AuthController::class,'logout'])->name('subscriber.logout');
Route::group(['middleware' => 'auth:subscriber'],function (){
    Route::get('/', [\App\Http\Controllers\Front\SubscriberController::class, 'index'])->name('front');
    Route::get('/blog/{blog}', [\App\Http\Controllers\Front\SubscriberController::class, 'showBlog'])->name('showBlog');
});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/',function (){
       return redirect(route('subscriber.index'));
    });
    Route::resource('subscriber',SubscriberController::class);
    Route::resource('blog',BlogController::class);
});
