<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * API 閮ㄥ垎
 */
Route::group(array('prefix' => 'api'), function()
{
	// 绛惧埌鍒涘缓鎺ュ彛锛堝惈璇勪环鍐呭锛�	Route::post('checkin', 'ApiCheckinController@create');

	// 鑾峰緱鏅偣绛惧埌鏁伴噺
	Route::get('checkin/{place_id}', 'ApiCheckinController@show');

	// 鑾峰緱鏅偣绛惧埌鐨勮瘎浠�	Route::get('checkin/{place_id}/comments', 'ApiCheckinController@comments');

	// 鑾峰緱鍏憡鍒楄〃
	Route::get('announcement', 'ApiAnnouncementController@index');

	// 鑾峰緱鍏憡璇︽儏
	Route::get('announcement/{announcement_id}', 'ApiAnnouncementController@show');
});

/**
 * 绠＄悊鍛橀儴鍒� */
Route::group(array('prefix' => 'admin'), function()
{
	Route::get('announcement', 'AnnouncementController@index');//鑾峰緱鍏憡鍒楄〃
	Route::post('announcement', 'AnnouncementController@create');//娣诲姞鍏憡
	Route::post('announcement/search', 'AnnouncementController@search'); 
	Route::get('announcement/{id}', 'AnnouncementController@show');
	Route::get('announcement/{id}/delete', 'AnnouncementController@destory');//鍒犻櫎涓�釜鍏憡
	Route::post('announcement/edit', 'AnnouncementController@put');
	Route::get('announcement/{id}/edit', 'AnnouncementController@edit');
	
	Route::get('checkin', 'CheckinController@index');
	Route::post('checkin/search', 'CheckinController@search');
	Route::get('checkin/{id}', 'CheckinController@show');
	Route::get('checkin/{id}/delete', 'CheckinController@destory');
});

/**
 * 鏍圭洰褰� */
Route::get('/', function()
{
	return View::make('hello');
});


/**
 * 绠＄悊鍛樼櫥闄� */
Route::get('login', 'LoginController@index');
Route::post('loginSuccess', 'LoginController@loginSuccess');























