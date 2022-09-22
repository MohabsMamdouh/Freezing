<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Technical Routes
|--------------------------------------------------------------------------
|
| Here is where Technicals can View their pages.
|
*/

Route::group(['middleware' => 'language'], function () {

    Route::middleware('App\Http\middleware\RequireRole:Technical')->group(function () {
        // Home Controller Pathes
        Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
            // Dashboard
            Route::get('dashboard', 'TechnicalHome')->name('TechnicalDashboard');
            Route::get('/', function ()
            {
                return redirect(route('TechnicalDashboard'));
            });
        });


        // Feedbacks Pathes
        Route::controller(\App\Http\Controllers\FeedbackController::class)->group(function ()
        {

        });

        // Technical Controller Pathes
        Route::controller(\App\Http\Controllers\TechnicalController::class)->group(function ()
        {

        });

        // Pricing Controller Pathes
        Route::controller(\App\Http\Controllers\PriceController::class)->group(function ()
        {

        });


        // Job Controller Pathes
        Route::controller(\App\Http\Controllers\JobController::class)->group(function ()
        {

        });
    });

});
