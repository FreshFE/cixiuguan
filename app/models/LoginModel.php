<?php

class LoginModel extends Eloquent
{
	/**
	 * 管理员登陆 *
	 *
	 */
	public static function adminLogin($username, $password)
	{
		$user = LoginModel::login($username,$password);
 		if($user) {
 			if(strlen($user[0]['username']) > 0) { 				
 				return $user;		
 			}
 		}
 		return false;
	}

	/**
	 * 登陆 *
	 *
	 */
	public static function login($username, $password)
	{
		$result = DB::table('user')->where('username', '=', $username)->get();
		if (is_array($result) && count($result) > 0) {
			if (strlen($password) > 0 && $password == $result[0]['password']) {
				return $result;
			}
		}
		return false;
	}

}