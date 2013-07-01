<?php

class ApiAnnouncementController extends BaseController
{
	/**
	 * 获得公告列表
	 */
	public function index()
	{
		$page = Input::get('page');
		$anns = array();
		$data = DB::table('announcement')->orderBy('id', 'desc')->paginate(10);
		$totalPage =$data->getLastPage();

		foreach ($data as $value) {
			$anns[] = $value;
		}

		if($page > $totalPage){//如果输入的页数超过总页数则return errorJson
			return $this->errorCommentsJson($anns);
		}else{
			return $this->successCommentsJson($anns);
		}
	}

	/**
	 * 获得公告详情
	 *
	 * @param int $announcement_id
	 */
	public function show($announcement_id)
	{
		$data = DB::table('announcement')->where('id', '=', $announcement_id)->lists('content');
        return $this->successJson($data);
	}
}