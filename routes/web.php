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
use App\Http\Controllers\MailController;
use App\Http\Controllers\VnpayController;
use App\Http\Controllers\HistoryOrderController;

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

Route::get('form_submit/{id}', [CartController::class,'form_submit']);

Route::post('cartdestroy/{id}', [CartController::class,'destroy']);

Route::get('CurrentcarDestroy/{id}', [CurrentcarController::class,'destroy']);

Route::get('/deletecar', [CarController::class,'destroy'])->name('deletecar');

Route::POST('updateProfile/{id}', [InforsController::class,'update']);

Route::POST('comment_submit',[CommentController::class,'store']);

Route::get('managerComment',[CommentController::class,'index'])->name("managerComment");

Route::POST('comment_reply/{id}',[ReplycommentController::class,'store']);

Route::POST('add_currentcar/{id}',[CurrentcarController::class,'store']);



Route::controller(SampleController::class)->group(function(){   

    Route::get('login', 'login')->name('login');

    Route::get('registration', 'registration')->name('registration');
    
    Route::get('logout','logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

    Route::get('dashboard', 'dashboard')->name('dashboard');

    Route::get('dashboardAdmin', 'dashboardAdmin')->name('dashboardAdmin');

    Route::get('profile', 'profile')->name('profile');

    Route::get('commentpage', 'comment')->name('commentpage');

    Route::get('insertProduct', 'insertProduct')->name('insertProduct');

    Route::get('details', 'details')->name('details');

    Route::get('cardetail/{id}', 'cardetail');

    Route::get('managerUser', 'managerUser')->name('managerUser');

    Route::get('confirmPay', 'confirmPay')->name('confirmPay');

    Route::get('/searchUser', 'searchUser');
  
});

Route::patch('/updateuser/{id}', ['as' => 'user.update', 'uses' => 'App\Http\Controllers\SampleController@update']);
 
Route::delete('/deleteuser/{id}', ['as' => 'user.delete', 'uses' => 'App\Http\Controllers\SampleController@delete']);

Route::patch('/update/{id}', ['as' => 'Comment.update', 'uses' => 'App\Http\Controllers\CommentController@update']);
 
Route::delete('/delete/{id}', ['as' => 'Comment.delete', 'uses' => 'App\Http\Controllers\CommentController@delete']);

Route::get('sellcar',[CarController::class,'index'])->name('sellcar');

Route::get('admin/managerProduct',[CarController::class,'managerProduct'])->name('managerProduct');

Route::post('action/insertProduct',[CarController::class,'store'])->name('cars.store');

Route::get('editProduct/{id}', [CarController::class,'editView']);

Route::post('updateProduct/{id}', [CarController::class,'update']);

Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');

Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);

Route::get('/action',[CarController::class,'action']);

Route::get('/choose_type_car',[CarController::class,'choose_type_car']);

Route::get('/choose_type_car_client',[CarController::class,'choose_type_car_client']);

Route::get('/searchProduct',[CarController::class,'searchProduct']);

Route::get('changeVisible/{id}',[ReplycommentController::class,'updateStatus'] )->name('changeVisible');

Route::get('changeCMVisible/{id}',[CommentController::class,'updateStatus'] )->name('changeCMVisible');

Route::get('/search-product',[CarController::class,'search_price_products'])->name('search.products');

Route::get('/search_product_clent',[CarController::class,'search_product_clent'])->name('search_product_clent');

Route::get('/sendEmail', [MailController::class,'index']);

Route::get('/store_vnpay',[VnpayController::Class,'store']);

Route::get('/analytics', [VnpayController::class,'index'])->name('analytics');

Route::get('/searchPay',[VnpayController::Class,'searchPay']);

Route::get('history',[HistoryOrderController::Class,'index'])->name('history');


