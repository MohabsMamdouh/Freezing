<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where Admin can Control The application.
|
*/

Route::group(['middleware' => 'language'], function () {

    Route::middleware('App\Http\middleware\RequireRole:Admin')->group(function () {
        // Home Controller Pathes
        Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
            // Dashboard
            Route::get('dashboard', 'AdminHome')->name('AdminDashboard');
            Route::get('/', function ()
            {
                return redirect(route('AdminDashboard'));
            });
        });

        // Site Controller Pathes
        Route::prefix('settings')->controller(\App\Http\Controllers\SiteController::class)->group(function () {
            // Update Settings
            Route::get('{id}', 'edit')->name('settings');
            Route::post('{id}', 'update')->name('updateSetting');
        });

        // Feedbacks Pathes
        Route::prefix('feedback')->controller(\App\Http\Controllers\FeedbackController::class)->group(function () {
            // Show all Feedback
            Route::get('show', 'index')->name('ShowFeedback');

            // Create Feedback
            Route::get('create', 'create')->name('CreateFeedback');
            Route::post('store', 'store')->name('StoreFeedback');
        });

        // Technical Controller Pathes
        Route::prefix('technicals')->controller(\App\Http\Controllers\TechnicalController::class)->group(function () {
            // Show all User
            Route::get('/', 'index')->name('technicals');

            // Show Individual User
            Route::get('{id}/show', 'show')->name('showTechnicals');

            // Show Profile
            Route::get('profile', 'profile')->name('MyProfile');
            Route::get('edit', 'editProfile')->name('EditProfile');

            // Create Technical
            Route::get('create', 'create')->name('createTechnicals');
            Route::post('store', 'store')->name('storeTechnicals');

            // Update Technical
            Route::get('{id}/edit', 'edit')->name('EditTechnicals');
            Route::post('update', 'update')->name('UpdateTechnicals');

            // Delete Technical
            Route::get('{id}/delete', 'destroy')->name('DeleteTechnicals');
        });

        // Pricing Controller Pathes
        Route::prefix('price')->controller(\App\Http\Controllers\PriceController::class)->group(function () {
            Route::get('{id}/plan', 'show')->name('ShowPlan');
            Route::post('update', 'update')->name('UpdatePlan');
        });


        // Job Controller Pathes
        Route::prefix('job')->controller(\App\Http\Controllers\JobController::class)->group(function () {
            // Show New Jobs
            Route::get('{status}/new', 'index')->name('NewJob');

            // Show Current Jobs
            Route::get('{status}/current', 'index')->name('CurrentJob');

            // Show Finish Jobs
            Route::get('{status}/finish', 'index')->name('FinishJob');

            // Show Finish Jobs
            Route::get('{status}/cancel', 'index')->name('CancelJob');

            // Show Individual Job
            Route::get('{id}/show', 'show')->name('ShowJob');

            // Assign job To technical
            Route::post('assignto', 'assignTo')->name('AssignTo');

            // Make Complete
            Route::get('{id}/status-complete', 'updateStatus')->name('updateStatus');

            // Edit Job
            Route::get('{id}/edit', 'edit')->name('EditJob');
            Route::post('update', 'update')->name('UpdateJob');

            // Create Jobs
            Route::get('create', 'create')->name('CreateJobs');
            Route::post('store', 'store')->name('StoreJobs');
        });
    });

});


