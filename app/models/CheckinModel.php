<?php

class CheckinModel extends Eloquent
{

	/**
	 * 得到签到内容 *
	 *
	 */
	public static function getCheckin()
	{
		$result = DB::table('checkin')->get();
		return $result;
	}

	/**
	 * 得到签到内容 *
	 *
	 *@param int $id
	*/
	public static function getCheckinById($id)
	{
		$result = DB::table('checkin')->where('id', '=', $id)->get();
		return $result;
	} 

	/**
	 * 删除签到内容 *
	 *
	 *@param int $id
	*/
	public static function deleteById($id)
	{
		$result = DB::table('checkin')->where('id', '=', $id)->delete();
		return $result;
	} 
}