<?php
Route::group(['prefix' => 'admin', 'middleware' => 'checkRoles'], function () {
    Route::resource('category_tour', 'Backend\CategoryTourController');
    Route::resource('search_keyword', 'Backend\SearchKeywordController');
    Route::get('setting_point', 'Backend\SettingPointController@index');
    Route::post('setting_point', 'Backend\SettingPointController@update');
    Route::resource('intro', 'Backend\IntroController');
    Route::resource('tour_promotion', 'Backend\TourPromotionController');
    Route::resource('tour_location_ratting', 'Backend\TourLocationRattingController');
    Route::get('ratting_tour', 'Backend\TourLocationRattingController@tour');
    Route::resource('video', 'Backend\VideoController');
    Route::resource('policy', 'Backend\PolicyController');
    Route::resource('faqs', 'Backend\FaqController');
});

Route::group(['prefix' => 'ajax'], function () {
    Route::get('getTour/{id}', 'Backend\AjaxController@listTourCategory');
});
