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

    // Home Controller Pathes
    Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
        // Dashboard
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('/', 'index')->name('dashboard');
    });

    // Site Controller Pathes
    Route::controller(\App\Http\Controllers\SiteController::class)->group(function () 
    {
        // Update Settings
        Route::get('{id}/settings', 'edit')->name('settings');
        Route::post('/settings', 'update')->name('updateSetting');
    });

    // Feedbacks Pathes
    Route::controller(\App\Http\Controllers\FeedbackController::class)->group(function ()
    {
        // Show all Feedback
        // Route::get('/feedback', 'index')->name('feedback');

        // Create Feedback
        Route::get('feedback/create', 'create')->name('CreateFeedback');
        Route::post('feedback/store', 'store')->name('StoreFeedback');
    });
    
    // Technical Controller Pathes
    Route::controller(\App\Http\Controllers\TechnicalController::class)->group(function ()
    {
        // Show all User
        Route::get('technicals', 'index')->name('technicals');

        // Show Individual User
        Route::get('{id}/technicals/show', 'show')->name('showTechnicals');

        // Create Technical
        Route::get('technicals/create', 'create')->name('createTechnicals');
        Route::post('technicals/store', 'store')->name('storeTechnicals');

        // Update Technical
        Route::get('technicals/{id}/edit', 'edit')->name('EditTechnicals');
        Route::post('technicals/update', 'update')->name('UpdateTechnicals');

        // Delete Technical
        Route::get('technicals/{id}/delete', 'destroy')->name('DeleteTechnicals');
    });

    // Pricing Controller Pathes
    Route::controller(\App\Http\Controllers\PriceController::class)->group(function ()
    {
        Route::get('price/{id}/plan', 'show')->name('ShowPlan');
        Route::post('price/update', 'update')->name('UpdatePlan');
    });


    // Job Controller Pathes
    Route::controller(\App\Http\Controllers\JobController::class)->group(function () 
    {
        // Show New Jobs
        Route::get('job/{status}/new', 'index')->name('NewJob');

        // Show Current Jobs
        Route::get('job/{status}/current', 'index')->name('CurrentJob');

        // Show Finish Jobs
        Route::get('job/{status}/finish', 'index')->name('FinishJob');

        // Show Finish Jobs
        Route::get('job/{status}/cancel', 'index')->name('CancelJob');

        // Show Individual Job
        Route::get('job/{id}/show', 'show')->name('ShowJob');

        // Assign job To technical
        Route::post('job/assignto', 'assignTo')->name('AssignTo');

        // Make Complete
        Route::get('job/{id}/status-complete', 'updateStatus')->name('updateStatus');

        // Edit Job
        Route::get('job/{id}/edit', 'edit')->name('EditJob');
        Route::post('job/update', 'update')->name('UpdateJob');

        // Create Jobs
        Route::get('job/create', 'create')->name('CreateJobs');
        Route::post('job/store', 'store')->name('StoreJobs');
    });
    
});


