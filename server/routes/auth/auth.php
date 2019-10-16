<?php

Route::group(['prefix' => 'v1'], function () {
    Route::group([
        'prefix' => 'auth',
        'namespace' => 'Auth'
    ], function () {
        Route::post('login', 'AuthController@login')->name('auth.login');
        Route::post('signup', 'AuthController@signup')->name('auth.signup');
        Route::get('signup/activate/{token}', 'AuthController@signupActivate')->name('auth.signup.activate');

        Route::group([
            'middleware' => 'auth:api'
        ], function () {
            Route::get('logout', 'AuthController@logout')->name('auth.logout');
            Route::get('user', 'AuthController@user');
        });
    });
});
