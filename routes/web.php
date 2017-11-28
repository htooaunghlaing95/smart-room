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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/api/register', 'UserController@apiRegister')->name('api.register');

Route::post('/api/login', 'UserController@apiLogin')->name('api.login');

Route::group(['middleware' => 'token'], function (){

    Route::get('/api/users', 'UserController@apiUsers')->name('api.users');

    Route::get('/api/user/{id}/show', 'UserController@apiUserShow')->name('api.user.show');

    Route::delete('/api/logout', 'UserController@apiLogout')->name('api.logout');


});
