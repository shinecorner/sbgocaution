<?php

Route::get('/home', function(){ return redirect( app()->getLocale().'/dashboard'); })->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    // echo LaravelLocalization::transRoute("routes.password_reset"); die();
    Route::get('/', 'AuthLoginController@loginForm')->name('login');
    Route::get(LaravelLocalization::transRoute("my.routes.FORGOT_PASSWORD_LINK"), 'AuthLoginController@showForgetPasswordForm');
    Route::get(LaravelLocalization::transRoute("my.routes.PASSWORD_RESET").'/{token}','AuthLoginController@showResetPasswordForm');
    Route::post(LaravelLocalization::transRoute("my.routes.LOGIN"),'AuthLoginController@login');
    Route::post(LaravelLocalization::transRoute("my.routes.PASSWORD_EMAIL"), 'AuthLoginController@sendResetPasswordLinkEmail');
    Route::post(LaravelLocalization::transRoute("my.routes.PASSWORD_UPDATE"), 'AuthLoginController@reset');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () { return view('My.dashboard.dashboardv1'); })->name('dashboard');
        Route::post(LaravelLocalization::transRoute("my.routes.LOGOUT"), 'AuthLoginController@logout');
    });
    Route::any('/{any}',function(){
        return  view('My.others.notFound');
    })->where('any','.*')->name('any');
});

