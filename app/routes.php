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
 * API部分
 */
Route::group(array('prefix' => 'api'), function()
{
	Route::group(array('prefix' => 'checkin'), function()
	{
		// 签到创建接口（含评价内容）
		Route::post('/', 'ApiCheckinController@create');

		// 获得景点签到数量
		Route::get('{place_id}', 'ApiCheckinController@show');

		// 获得景点签到的评价
		Route::get('{place_id}/comments', 'ApiCheckinController@comments');
	});

	Route::group(array('prefix' => 'announcement'), function()
	{
		// 获得公告列表
		Route::get('/', 'ApiAnnouncementController@index');

		// 获得公告详情
		Route::get('{announcement_id}', 'ApiAnnouncementController@show');
	});
});

/**
 * 管理员部分
 */
Route::group(array('prefix' => 'admin'), function()
{
	// 公告
	Route::group(array('prefix' => 'announcement'), function()
	{
		Route::get('/', 'AnnouncementController@index');
		Route::get('create', 'AnnouncementController@getCreate');
		Route::post('create', 'AnnouncementController@postCreate');
		Route::get('search', 'AnnouncementController@search');
		Route::get('{id}/edit', 'AnnouncementController@getEdit');
		Route::post('edit', 'AnnouncementController@postEdit');
		Route::get('{id}', 'AnnouncementController@show');
		Route::get('{id}/delete', 'AnnouncementController@destory');
	});
	
	// 签到
	Route::group(array('prefix' => 'checkin'), function()
	{
		Route::get('/', 'CheckinController@index');
		Route::get('search', 'CheckinController@search');
		Route::get('{id}', 'CheckinController@show');
		Route::get('{id}/delete', 'CheckinController@destory');
	});

	// 后台首页
	Route::get('/', 'AdminController@index');
});

/**
 * 根目录 */
Route::get('/', function()
{
	return View::make('hello');
});


/**
 * 管理员登陆
 */
//登陆页面
Route::get('login', 'LoginController@index');

//登陆成功跳转
Route::post('loginSuccess', 'LoginController@loginSuccess');
