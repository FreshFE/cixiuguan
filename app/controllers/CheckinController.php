<?php

class CheckinController extends BaseController
{	
	/**
	 * 显示签到信息	 *
	 *
	 */
	public  function index()
	{
		$result = CheckinModel::getCheckin();

		if(is_array($result) && count($result)> 0 ) {
			return View::make('checkin', array('checkinDetail' => $result));
		} else {
			echo 'error';
		}
	}
	
	/**
	 * 签到内容搜索 *
	 *
	 */
	public function search()
	{
		$id = Input::get('id');
		return $this->show($id);
	}
	
	/**
	 * 签到内容搜索 *
	 * @param int $id
	 */
	public function show($id)
	{
		$result = CheckinModel::getCheckinById($id);

		if(is_array($result) && count($result)> 0 ) {
			return View::make('checkin', array('checkinDetail' => $result));
		} else {
			echo 'error';
		}
	}
	
	/**
	 * 删除签到内容 *
	 * 
	 */
	public function destory($id)
	{
		$result = CheckinModel::deleteById($id);
		
		if($result > 0){
			return Redirect::action('CheckinController@index');
		} else {
			echo 'error';
		}
	}

}