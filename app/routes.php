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
	// 签到创建接口（含评价内容）
	Route::post('checkin', 'ApiCheckinController@create');

	// 获得景点签到数量
	Route::get('checkin/{place_id}', 'ApiCheckinController@show');

	// 获得景点签到的评价
	Route::get('checkin/{place_id}/comments', 'ApiCheckinController@comments');

	// 获得公告列表
	Route::get('announcement', 'ApiAnnouncementController@index');

	// 获得公告详情
	Route::get('announcement/{announcement_id}', 'ApiAnnouncementController@show');
});

/**
 * 管理员部分
 */
Route::group(array('prefix' => 'admin'), function()
{
	// 后台首页
	Route::get('/', 'AdminController@index');

	//布告列表
	Route::get('announcement', 'AnnouncementController@index');

	//布告创建
	Route::post('announcement', 'AnnouncementController@create');

	//布告搜索
	Route::post('announcement/search', 'AnnouncementController@search'); 
	Route::get('announcement/{id}', 'AnnouncementController@show');

	//布告删除
	Route::get('announcement/{id}/delete', 'AnnouncementController@destory');

	//布告更新
	Route::post('announcement/edit', 'AnnouncementController@put');
	Route::get('announcement/{id}/edit', 'AnnouncementController@edit');
	
	//签到列表
	Route::get('checkin', 'CheckinController@index');

	//签到搜索
	Route::get('checkin/search', 'CheckinController@search');
	Route::get('checkin/{id}', 'CheckinController@show');

	//签到删除
	Route::get('checkin/{id}/delete', 'CheckinController@destory');
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

Route::get('admin/test/checkin', function()
{
	return View::make('admin/checkin/index');
});





















