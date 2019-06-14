<?php

Route::get('/home', function(){ return redirect( app()->getLocale().'/dashboard'); })->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    // echo LaravelLocalization::transRoute("routes.password_reset"); die();
    Route::get('/', 'AuthLoginController@loginForm')->name('login');
    Route::get(LaravelLocalization::transRoute("customer.routes.FORGOT_PASSWORD_LINK"), 'AuthLoginController@showForgetPasswordForm');
    Route::get(LaravelLocalization::transRoute("customer.routes.PASSWORD_RESET").'/{token}','AuthLoginController@showResetPasswordForm');
    Route::post(LaravelLocalization::transRoute("customer.routes.LOGIN"),'AuthLoginController@login');
    Route::post(LaravelLocalization::transRoute("customer.routes.PASSWORD_EMAIL"), 'AuthLoginController@sendResetPasswordLinkEmail');
    Route::post(LaravelLocalization::transRoute("customer.routes.PASSWORD_UPDATE"), 'AuthLoginController@reset');

    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () { return view('customer.dashboard.dashboardv1'); })->name('dashboard');
        Route::post(LaravelLocalization::transRoute("customer.routes.LOGOUT"), 'AuthLoginController@logout');
    });
    Route::any('/{any}',function(){
        return  view('customer.others.notFound');
    })->where('any','.*')->name('any');
});

