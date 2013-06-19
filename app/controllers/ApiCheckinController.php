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
		// 获得 post 数据传入
		$data = Input::all();

		// 测试数据，临时
		$data = array(
			'place_id' => 6,
			'lat' => '22.532987',
			'lng' => '22.532987',
			'comments' => '988okokokokokokokok',
			'stars' => 3,

		);

		// 验证规则
		$validator = Validator::make($data, array(
			'place_id' =>  array('required', 'numeric'),
			'lat' => array('required'),
			'lng' => array('required'),
			'comments' => array('required', 'max:500'),
			'stars' => array('required', 'integer')
		));

		if ($validator->fails()) {
			// 验证失败
			return $this->errorJson($validator->messages());
	    } else {
	    	// 验证成功，插入数据库
			DB::table('checkin')->insert($data);
			return $this->successJson($data);
	    }
	}

	/**
	 * 获得景点签到数量
	 *
	 * @param int $place_id
	 */
	public function show($place_id)
	{
		$data = DB::table('checkin')->where('place_id', '=', $place_id)->count();
		return $this->successJson($data);
	}

	/**
	 * 获得景点签到的评价
	 *
	 * @param int $place_id
	 */
	public function comments($place_id)
	{
		$data = DB::table('checkin')->where('place_id', '=', $place_id)->lists('comments');
		return $this->successJson($data);
	}
}