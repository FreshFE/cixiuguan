<?php

class CheckinController extends BaseController
{	
	/**
	 * 显示签到信息
	 */
	public  function index()
	{
		return View::make('admin/checkin/index',
			array('checkinDetail' => CheckinModel::getCheckin())
		);
	}
	
	/**
	 * 签到内容搜索
	 */
	public function search()
	{
		return $this->show(Input::get('id'));
	}
	
	/**
	 * 签到内容搜索
	 *
	 * @param int $id
	 */
	public function show($id)
	{
		return View::make('admin/checkin/index',
			array('checkinDetail' => CheckinModel::getCheckinById($id))
		);
	}
	
	/**
	 * 删除签到内容
	 */
	public function destory($id)
	{	
		if(CheckinModel::deleteById($id)) {
			Session::flash('error', '删除成功');
		} else {
			Session::flash('error', '删除失败');
		}

		return Redirect::back();
	}

}