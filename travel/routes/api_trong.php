<?php

Route::post('login', 'LoginController@login');
Route::post('login_fb', 'LoginController@loginFb');
Route::post('login_gg', 'LoginController@loginGg');
Route::post('register', 'LoginController@register');
Route::get('tour_location_hot', 'TourLocationController@index');
Route::get('rating_tour_location/{id}', 'TourLocationController@rattingTourLocation');
Route::get('rating_tour_location_display/{id}', 'TourLocationController@rattingTourLocationDisplay');
Route::get('tour_hot_with_tour_location/{id}', 'TourLocationController@tourHotWithTourLocation');
Route::get('tour_hot_new_with_tour_location/{id}', 'TourLocationController@tourHotNewWithTourLocation');
Route::get('tour_location_category/{id}', 'TourLocationController@tourCategoryWithTourLocation');
Route::get('list_tour_location', 'TourLocationController@listLocations');
Route::get('location_item/{id}', 'TourLocationController@locationItem');
Route::post('forgot_password', 'LoginController@forgotPassword');
Route::put('update_password', 'LoginController@updatePassword');
Route::get('tour_hot', 'TourController@indexHot');
Route::get('search_keyword', 'SearchKeywordController@index');
Route::get('category_tour/{id}', 'CategoryTourController@index');
Route::get('intro', 'IntroController@index');
Route::get('is_verified', 'LoginController@isVerified');
Route::group(['middleware' => 'jwt.GetInfo'], function () {
});

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('get_user', 'LoginController@getInfo');
    Route::put('update_user', 'LoginController@updateinfo');
    Route::post('update_avatar', 'LoginController@updateAvatar');
    Route::put('chage_password', 'LoginController@chagePassword');
    Route::post('click_tour', 'LoginController@clickTour');
    Route::post('view_video', 'VideoController@viewVideo');
    Route::post('tour_location_rating', 'TourLocationRatingController@rating');
    Route::post('tour_rating', 'TourLocationRatingController@rattingTour');
    Route::get('history_tour_view', 'TourController@historyTourView');
    Route::get('recently_tour_view', 'TourController@recentlyTourView');
    Route::get('level_me', 'LevelController@index');
    Route::post('plus_point', 'VideoController@plusPoint');
    Route::get('video', 'VideoController@index');
});
