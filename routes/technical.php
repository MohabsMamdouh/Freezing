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
        Route::prefix('feedback')->name('Feedback.')->controller(\App\Http\Controllers\FeedbackController::class)->group(function ()
        {
            Route::get('{id}/show', 'show')->name('Show');
        });

        // Pricing Controller Pathes
        Route::controller(\App\Http\Controllers\PriceController::class)->group(function ()
        {


        });

        // Technical Controller Pathes
        Route::prefix('technicals')->name('Technical.')->controller(\App\Http\Controllers\TechnicalController::class)->group(function ()
        {
            // Show Profile
            Route::get('profile', 'profile')->name('MyProfile');
            Route::get('edit', 'editProfile')->name('EditProfile');
            Route::post('update', 'update')->name('Update');
        });


        // Job Controller Pathes
        Route::prefix('job')->name('Job.')->controller(\App\Http\Controllers\JobController::class)->group(function ()
        {
            // Show Current Jobs
            Route::get('{status}/current', 'myJob')->name('Current');

            // Show Finish Jobs
            Route::get('{status}/finish', 'myJob')->name('Finish');

            // Make Complete
            Route::get('{id}/status-complete', 'updateStatus')->name('updateStatus');

            // Show Individual Job
            Route::get('{id}/show', 'show')->name('Show');

            // Edit Job
            Route::get('{id}/edit', 'edit')->name('Edit');
            Route::post('update', 'update')->name('Update');
        });
    });

});
