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
    return redirect('login');
});
Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');
include_once 'web_trong.php';
include_once 'web_quang.php';
Route::group(['prefix' => 'admin', 'middleware' => 'checkRoles'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('users', 'Backend\UserController');
    Route::resource('rank', 'Backend\RankController');
    Route::resource('tour-location', 'Backend\TourLocationController');
    Route::resource('package', 'Backend\TourPackageController');
    Route::resource('tour', 'Backend\TourController');
    Route::resource('taxonomy', 'Backend\TaxonomyController');
    Route::group(['prefix' => 'ajax'], function () {
        Route::get('check-phone', 'Backend\AjaxController@checkPhone');
        Route::get('get-taxonomy', 'Backend\AjaxController@getTaxonomy');
    });
});

Route::get('/logout', 'LoginController@logout');
