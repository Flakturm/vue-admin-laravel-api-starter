<?php

Route::group(['prefix' => 'v1'], function () {
    Route::group([
        'prefix' => 'auth',
        'namespace' => 'Auth',
        'prefix' => 'password/token'
    ], function () {
        Route::post('create', 'PasswordResetController@create')->name('password.create.token');
        Route::get('find/{token}', 'PasswordResetController@find')->name('password.find.token');
        Route::post('reset', 'PasswordResetController@reset')->name('password.reset');
    });
});
