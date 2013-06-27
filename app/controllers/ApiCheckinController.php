<?php

class ApiCheckinController extends BaseController
{
	/**
	 * 签到创建接口（含评价内容）
	 * 输入内容由 post 提交的数据处理
	 *
	 * @param form post
	 * @return string json
	 */
	public function create()
	{
		// 通过 Input post 方式获得数据
		$data = array(
			'place_id' => Input::get('place_id'),
			'lat' => Input::get('lat'),
			'lng' => Input::get('lng'),
			'comments' => Input::get('comments'),
			'stars' => Input::get('stars'),
			'create_at' => date('Y-m-d H:i')
		);

		// 验证规则
		$validator = Validator::make($data, array(
			'place_id' =>  array('required', 'numeric'),
			'comments' => array('required', 'max:500'),
			'stars' => array('required', 'integer')
		));

		// 验证失败
		if ($validator->fails()) {
	    	return $this->errorJson($validator->messages()->first());
	    }
	    // 验证成功，插入数据库
	    else {
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
		$data['counts'] = DB::table('checkin')->where('place_id', '=', $place_id)->count();
		
		// 得到checkin的stars字段，这是一个数组，array(1,2,3,4,1,3)，求平均数，加入$data
		$data['starsAvg'] = round(DB::table('checkin')->where('place_id', '=', $place_id)->avg('stars'));

		if (empty($data['starsAvg'])) {
			$data['starsAvg'] = '3';
		}

 		return $this->successJson($data);
	}

	/**
	 * 获得景点签到的评价
	 *
	 * @param int $place_id
	 */
	public function comments($place_id)
	{
		//$data = DB::table('checkin')->where('place_id', '=', $place_id)->get();
		//return $this->successJson($data);
		$page = Input::get('page');
		$comments = array();
		$data = DB::table('checkin')->where('place_id', '=', $place_id)->paginate(10);
		$totalPage =$data->getLastPage();
		
		foreach ($data as $value) {
			$comments[] = $value;
			/*
			$comments[] = $value['comments'];
			$comments[] = $value['id'];
			$comments[] = $value['place_id'];
			$comments[] = $value['lat'];
			$comments[] = $value['lng'];
			$comments[] = $value['stars'];
			$comments[] = $value['valid_tag'];
			$comments[] = $value['create_at'];
			$comments[] = $value['update_at'];*/
		}

		if($page > $totalPage){//如果输入的页数超过总页数则return errorJson
			return $this->errorCommentsJson($comments);
		}else{
			return $this->successCommentsJson($comments);
		}
	}
}