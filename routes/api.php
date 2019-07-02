<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup');
});

Route::group([
	'middleware' => 'auth:api'
], function(){
    Route::post('user/role', 'RoleController@assignment');
    Route::post('role/permission', 'PermissionController@assignment');
    Route::resource('offers', 'OfferController');
    Route::put('contacts/change_status/{id}', 'ContactController@change_status');
    Route::resource('contacts', 'ContactController');
    Route::resource('privatelandlords', 'PrivateLandlordController');
    Route::resource('realestateagencies', 'RealestateAgencyController');
    Route::resource('houseowners', 'HouseOwnerController');
    Route::resource('brokers', 'BrokerController');
    Route::put('configs/all','ConfigController@updateAll');
    Route::resource('configs', 'ConfigController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::put('users/change_status/{id}', 'UserController@change_status');
    Route::resource('users', 'UserController');
    Route::resource('templates', 'TemplateController');
    Route::resource('autosuggestions','AutosuggestionController');
});


Route::any('/{any}',function(){
    return response()->json(['response' =>[
                               'api_status'=>0,
                               'code'=>404,
                               'message'=> 'not found'
                               ]
                        ],404);
})->where('any','.*');