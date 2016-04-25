<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('pages/about');
});
Route::get('/projects', function () {
    return view('pages/projects');
});
Route::get('/contact', function () {
    return view('pages/contact');
});



Route::group(['middleware' => ['cors']], function()
{
    Route::resource('comment', 'CommentController');

    Route::group(['prefix' => 'api'], function()
    {
        Route::group(['prefix' => 'comments'], function()
        {
            Route::resource('comment', 'CommentController');
        });

        Route::group(['prefix' => 'evasion'], function()
        {
            Route::resource('evasion_profile', 'BanEvasion\BanEvaderProfileController');
            Route::resource('evasion_ips', 'BanEvasion\BanEvaderIPRangeController');

            Route::get('evaders', 'BanEvasion\BanEvaderController@ipList');
            Route::get('clear', 'BanEvasion\BanEvaderController@clearCache');
            Route::get('find_evader/{input}', 'BanEvasion\BanEvaderController@findEvasionInformation');
            Route::get('account_matches/{id}', 'BanEvasion\BanEvaderController@findAccounts');
            Route::get('ip_matches/{ip}', 'BanEvasion\BanEvaderController@findRanges');
        });
    });
});

Route::get('/gishwhes', function() {
    return view('pages.gishwhes.generator');
});