<?php

class ApiAnnouncementController extends Controller
{
	/**
	 * 获得公告列表
	 */
	public function index()
	{
		$data = DB::table('announcement')->get();
        return Response::json($data);
	}

	/**
	 * 获得公告详情
	 *
	 * @param int $announcement_id
	 */
	public function show($announcement_id)
	{
		$data = DB::table('announcement')->where('id', '=', $announcement_id)->lists('content');
        return Response::json($data);
	}
}