<?php

class ApiAnnouncementController extends Controller
{
	/**
	 * 获得公告列表
	 */
	public function index()
	{
		return 'index';
	}

	/**
	 * 获得公告详情
	 *
	 * @param int $announcement_id
	 */
	public function show($announcement_id)
	{
		return 'show' . $announcement_id;
	}
}