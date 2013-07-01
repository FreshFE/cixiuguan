<?php

class AnnouncementController extends BaseController
{
	/**
	 * 显示布告数据
	 */
	public  function index()
	{
		return View::make('admin/announcement/index',
			array('datas' => AnnouncementModel::getAnnouncement())
		);
	}

	/**
	 * 布告搜索功能 *
	 *
	 */
	public function search()
	{
		$id = Input::get('id');
		return $this->show($id);
	}

	/**
	 * 根据ID 搜索布告	 *
	 *@param int $aid
	 */
	public function show($id)
	{
		$result = AnnouncementModel::getAnnouncementById($id);

		if(is_array($result) && count($result)> 0 ) {
			return View::make('announcement', array('announcementDetail' => $result));
		} else {
			echo 'error';
		}
	}

	/**
	 * 创建布告 *
	 *	 
	 */
	public function create()
	{
		date_default_timezone_set('PRC');//设置成北京时间
		$create_at = date('Y-m-d H:i'); 
		$title = Input::get('title');
		$content = Input::get('content');
		$valid_tag = Input::get('valid_tag');
		
		$data = array(
			'title' => $title,
			'content' => $content, 
			'valid_tag' => $valid_tag,
			'create_at' => $create_at
		);

		//数据验证
		$validator = Validator::make($data, array(
			'title' => array('required', 'max:100'),
			'content' => array('required', 'max:500'),
			'valid_tag' => array('required', 'integer')
		));

		if ($validator->fails()) {
			return 'error';
	    } else {
	    	$result = AnnouncementModel::insertAnnouncement($data);
	    	if($result == true) {
	    		return Redirect::action('AnnouncementController@index');
	    	} else {
	    		return 'error';
	    	}
	    }
	}

	/**
	 * 删除布告	 *
	 *@param int $id
	 */
	public function destory($id)
	{ 
		$result = AnnouncementModel::deleteById($id);

		if($result > 0){
			return Redirect::action('AnnouncementController@index');
		} else {
			echo 'error';
		}
	}

	/**
	 * 修改布告字段，跳转到修改页面 *
	 *@param int $id
	 */
	public function edit($id)
	{
		$result = AnnouncementModel::getAnnouncementById($id);
		
		if(is_array($result) && count($result)> 0 ) {
			return View::make('announcementUpdate', array('announcementDetail' => $result));
		} else {
			echo 'error';
		}
	}
	
	/**
	 * 修改布告字段 *
	 *
	 */
	public function put()
	{
		$id = Input::get('id');

		$data = array(
			'title' => 	 Input::get('title'),
			'content' => Input::get('content'),
		);
		
		$result = AnnouncementModel::updateById($id, $data);
		
		if ($result > 0) {
			return Redirect::action('AnnouncementController@index');
		} else {
			return "error";
		}		
	}
	
}