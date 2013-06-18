<?php

class ApiCheckinController extends BaseController
{
	/**
	 * 签到创建接口（含评价内容）
	 *
	 * 输入内容由 post 提交的数据处理
	 */
	public function create()
	{
		
		return 'create';
	}

	/**
	 * 获得景点签到数量
	 *
	 * @param int $place_id
	 */
	public function show($place_id)
	{
		$data = DB::table('checkin')->where('place_id', '=', $place_id)->lists('id');
		return Response::json($data);
	}

	/**
	 * 获得景点签到的评价
	 *
	 * @param int $place_id
	 */
	public function comments($place_id)
	{
		$data = DB::table('checkin')->where('place_id', '=', $place_id)->lists('comments');
		return Response::json($data);
	}
}