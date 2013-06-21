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
 * API 部分
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
	Route::get('announcement', 'AnnouncementController@index');//获得公告列表
	Route::post('announcement', 'AnnouncementController@create');//添加公告
	Route::post('announcement/search', 'AnnouncementController@search'); 
	Route::get('announcement/{id}', 'AnnouncementController@show');
	Route::get('announcement/{id}/delete', 'AnnouncementController@destory');//删除一个公告
	Route::get('announcement/{id}/edit', 'AnnouncementController@put');
});

/**
 * 根目录
 */
Route::get('/', function()
{
	return View::make('hello');
});


/**
 * 得到布告详情
 */






















