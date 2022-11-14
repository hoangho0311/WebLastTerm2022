<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


use App\Http\Controllers\SampleController;
use App\Http\Controllers\Carcontroller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InforsController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplycommentController;
use App\Http\Controllers\CurrentcarController;



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

Route::get('/', function () {
    return view('login/login');
});

Route::post('form_submit/{id}', [CartController::class,'form_submit']);

Route::post('cartdestroy/{id}', [CartController::class,'destroy']);

Route::post('deletecar/{id}', [CarController::class,'destroy']);

Route::POST('updateProfile/{id}', [InforsController::class,'update']);

Route::POST('comment_submit',[CommentController::class,'store']);

Route::POST('comment_reply/{id}',[ReplycommentController::class,'store']);

Route::POST('add_currentcar/{id}',[CurrentcarController::class,'store']);



Route::controller(SampleController::class)->group(function(){   

    Route::get('login', 'login')->name('login');

    Route::get('registration', 'registration')->name('registration');
    
    Route::get('logout','logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');

    Route::get('profile', 'profile')->name('profile');

    Route::get('commentpage', 'comment')->name('commentpage');

    Route::get('analytics', 'analytics')->name('analytics');

    Route::get('insertProduct', 'insertProduct')->name('insertProduct');

    Route::get('details', 'details')->name('details');

    Route::get('details', 'details')->name('details');

    Route::POST('cardetail/{id}', 'cardetail');
  
});

Route::get('sellcar',[CarController::class,'index'])->name('sellcar');

Route::get('admin/managerProduct',[CarController::class,'managerProduct'])->name('managerProduct');

Route::post('action/insertProduct',[CarController::class,'store'])->name('cars.store');

Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');

Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);
