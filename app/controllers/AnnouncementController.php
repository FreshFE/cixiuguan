<?php

class AnnouncementController extends BaseController
{
	/**
	 * 获得公告所有数据
	 *
	 */
	public  function index()
	{
		$result = AnnouncementModel::getAnnouncement();

		if(is_array($result) && count($result)> 0 ) {
			return View::make('announcement', array('announcementDetail' => $result));
		} else {
			echo "error";
		}

	}

	/**
	 * 获得公告数据
	 *
	 *@param int $id
	 */
	public function show()
	{
		$id = Input::get("aid");

		$result = AnnouncementModel::getAnnouncementById($id);
		if(is_array($result) && count($result)> 0 ) {

			return View::make('announcement', array('announcementDetail' => $result));
		} else {
			echo "error";
		}
	}

	/**
	 * 插入公告数据
	 *
	 */
	public function create()
	{

		// 获得 post 数据传入,由于CSRF Protection,在接收的参数中多了一个_token参数，用except去除
		$inputData = Input::except('_token');

		// 验证规则
		$validator = Validator::make($inputData, array(
			'title' => array('required', 'max:100'),
			'content' => array('required', 'max:500'),
			'valid_tag' => array('required', 'integer')
		));

		if ($validator->fails()) {
			return "error";
	    } else {
	    	$result = AnnouncementModel::insertAnnouncement($inputData);
	    	if($result == true) {
	    		return Redirect::to('announcementIndex');
	    	} else {
	    		return "error";
	    	}
	    }
	}

	/**
	 * 删除公告数据
	 *
	 *@param int $id
	 */
	public function destory($id)
	{ 
		$result = AnnouncementModel::deleteById($id);
		if($result > 0){
			return Redirect::to('announcementIndex');
		} else {
			echo "error";
		}
	}
}