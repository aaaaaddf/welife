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
Route::get('/', 'CamppostsController@index')->name('campposts.index');
Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    Route::resource('campposts','CamppostsController');
    Route::get('Campposts/create','CamppostsController@create')->name('campposts.form');
    Route::post('borrow/{id}','CamppostBorrowsController@store')->name('camppost_borrows.store');
    Route::get('search','CamppostsController@search')->name('search');
    Route::get("request/{owner_id}",'CamppostBorrowsController@notification')->name('notification');
});
