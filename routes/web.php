<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'language'], function () {

    Route::controller(\App\Http\Controllers\UserhomeController::class)->group(function ()
    {
        Route::get('/', 'index')->name('UserHome');
        Route::post('store', 'store')->name('StoreJob');
    });

    Auth::routes(['register' => false]);

    Route::controller(\App\Http\Controllers\Auth\ForgotPasswordController::class)->group(function ()
    {
        Route::get('forget-password', 'showForgetPasswordForm')->name('showForgetPasswordForm');
        Route::post('send-email', 'submitForgetPasswordForm')->name('submitForgetPasswordForm'); 
    });

    Route::controller(\App\Http\Controllers\MailerController::class)->group(function ()
    {
        Route::get('sendemail/{user}/{email}/{token}', 'composeEmail')->name('sendEmail');
    });

    Route::controller(\App\Http\Controllers\Auth\ResetPasswordController::class)->group(function ()
    { 
        Route::get('reset-password/{token}', 'showResetPasswordForm')->name('showResetPasswordForm');
        Route::post('reset-password', 'sendPasswordResetNotification')->name('submitResetPasswordForm');
    });
    
});


