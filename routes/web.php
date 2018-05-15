<?php

Auth::routes();

Route::group(['middleware' => ['auth']], function(){

    Route::get('/', 'AppController@index');

    Route::get('/search', 'AppController@search');

    Route::get('/instagram', 'InstagramController@redirectToInstagramProvider');

    Route::get('/instagram/callback', 'InstagramController@handleProviderInstagramCallback');
});

