<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'law'], function () {
    Route::get('/','LawController@get');
    Route::get('/search','LawController@find');
    Route::get('/themes', 'LawController@themes');
    Route::get('/themes/{themeId}', 'LawController@showTheme');
    Route::get('/rss', 'LawController@feed');

});
