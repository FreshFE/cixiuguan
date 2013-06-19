<?php

class ApiAnnouncementController extends BaseController
{
	/**
	 * 获得公告列表
	 */
	public function index()
	{
		$data = DB::table('announcement')->get();
        return $this->successJson($data);
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