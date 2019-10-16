<?php

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

// Route::get('signup/activate/success', function () {
//     if (!request()->hasValidSignature()) {
//         abort(401);
//     }
//     return view('success');
// })->name('signup.activate.success');

// Route::get('signup/activate/{token}', 'Api\AuthController@signupActivate')
//     ->name('signup.activate');

Route::get('/', function () {
    abort(401);
});
