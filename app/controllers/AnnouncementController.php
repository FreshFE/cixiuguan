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
	 * 根据ID 搜索布告	 *
	 *@param int $aid
	 */
	public function show()
	{
		$id = Input::get('id');
		return View::make('admin/announcement/index',
			array('datas' => AnnouncementModel::firstById($id))
		);
	}

	public function getCreate()
	{
		return View::make('admin/announcement/create');
	}

	/**
	 * 创建布告
	 */
	public function postCreate()
	{		
		$data = array(
			'title' => Input::get('title'),
			'content' => Input::get('content'), 
			'valid_tag' => 0,
			'create_at' => date('Y-m-d H:i')
		);

		// 验证规则
		$validator = Validator::make($data, array(
			'title' => array('required', 'max:100'),
			'content' => array('required', 'max:500')
		));

		// 验证未通过
		if(! $validator->fails()) {
			Session::flash('error', $validator->messages()->first());
	    }

	    // 创建失败
	    if(! AnnouncementModel::insertAnnouncement($data)) {
	    	Session::flash('error', '创建失败');
	    }

	    // 创建成功
		return Redirect::action('AnnouncementController@index');
	}

	/**
	 * 删除布告
	 *
	 * @param int $id
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
	 * 修改布告字段，跳转到修改页面
	 *
	 * @param int $id
	 * @return stdClass
	 */
	public function getEdit($id)
	{
		return View::make('admin/announcement/edit',
			array('data' => AnnouncementModel::firstById($id))
		);
	}
	
	/**
	 * 修改布告字段
	 */
	public function postEdit()
	{
		$id = Input::get('id');

		$data = array(
			'title' => Input::get('title'),
			'content' => Input::get('content'), 
		);

		// 验证规则
		$validator = Validator::make($data, array(
			'title' => array('required', 'max:100'),
			'content' => array('required', 'max:500')
		));

		// 验证未通过
		if(! $validator->fails()) {
			Session::flash('error', $validator->messages()->first());
	    }

	    // 创建失败
	    if(! AnnouncementModel::updateById($id, $data)) {
	    	Session::flash('error', '编辑失败');
	    }

	    // 创建成功
		return Redirect::action('AnnouncementController@index');
	}
}