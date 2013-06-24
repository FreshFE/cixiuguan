<?php

class AnnouncementModel extends Eloquent
{

	/**
	 * 获得公告所有数据 *
	 *
	 */
	public static function getAnnouncement()
	{
		$result = DB::table('announcement')-> get();
		return $result;
	}

	/**
	 * 获得公告数据 *
	 *
	 *@param int $id
	 */
	public static function getAnnouncementById($id)
	{
		$result = DB::table('announcement')->where('id', '=', $id)->get();
		return $result;
	}

	/**
	 * 插入公告数据 *
	 *
	 */
	public static function insertAnnouncement($announcementArray)
	{
		$result = DB::table('announcement')->insert($announcementArray);
		return $result;	
	}

	/**
	 * 删除公告数据 *
	 *
	 *@param int $id
	 */
	public static function deleteById($id)
	{
		$result = DB::table('announcement')->where('id', '=', $id)->delete();
		return $result;
	}

	/**
	 * 更新公告数据 *
	 *
	 *@param int $id, array announcement
	 */
	public static function updateById($id, $announcementArray)
	{
		$result = DB::table('announcement')
							->where('id', '=', $id)
							->update($announcementArray);
		return $result;
	}  
}