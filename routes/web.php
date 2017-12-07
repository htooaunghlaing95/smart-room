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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('user', 'UserController');

});

Auth::routes();

Route::post('/api/register', 'UserController@apiRegister')->name('api.register');

Route::post('/api/login', 'UserController@apiLogin')->name('api.login');

Route::group(['middleware' => 'token'], function (){

    Route::get('/api/users', 'UserController@apiUsers')->name('api.users');

    Route::get('/api/user/{id}/show', 'UserController@apiUserShow')->name('api.user.show');

    Route::delete('/api/logout', 'UserController@apiLogout')->name('api.logout');

    Route::post('/api/user/{id}/state', 'UserController@apiState')->name('api.state');

    Route::get('/api/user/{id}/getstate', 'UserController@apiGetState')->name('api.getState');

    Route::get('/api/fetch', 'UserController@apiFetch')->name('api.fetch');

    Route::get('/api/init', 'UserController@apiInit')->name('api.init');

    Route::post('/api/user/{id}/present', 'UserController@apiPresent')->name('api.present');

});
