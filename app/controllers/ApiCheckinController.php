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
		$data = Input::all();
		$data = array(
			'id' => 'NULL' ,
			'place_id' => 6,
			'lat' => '22.532987',
			'lng' => '22.532987',
			'comments' => '988okokokokokokokok',
			'stars' => 3,
			'valid_tag' => 56,
			'create_at' => '2013-06-18 20:43:55',
			'update_at' => '2013-06-18 20:43:55'
		);
		$rules = array(
			'place_id' =>  array('required','numeric'),
			'lat' => array('required'),
			'lng' => array('required'),
			'comments' => array('required','max:500'),
			'stars' => array('required','integer')	 	
		);
		$validator = Validator::make($data,$rules);
		if ($validator->fails()) {
			return $messages = $validator->messages();
	    }else
	    	DB::table('checkin')->insert($data);	
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