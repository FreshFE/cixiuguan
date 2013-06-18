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
		// 测试
		// 测试 git
		return 'create';
	}

	/**
	 * 获得景点签到数量
	 *
	 * @param int $place_id
	 */
	public function show($place_id)
	{
		return 'show' . $place_id;
	}

	/**
	 * 获得景点签到的评价
	 *
	 * @param int $place_id
	 */
	public function comments($place_id)
	{
		return 'comments' . $place_id;
	}
}