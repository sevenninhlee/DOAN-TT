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

Route::get('/', 'SpaController@index')->where('any', '.*');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('users', 'UsersController');
    Auth::routes();
});

Route::get('/admin/settings', 'UsersController@settings')->name('admin.settings');
Route::put('/admin/password', 'UsersController@password')->name('admin.password');
Route::put('/admin/profile', 'UsersController@profile')->name('admin.profile');

Route::get('/admin/index', 'WelcomeController@index');
