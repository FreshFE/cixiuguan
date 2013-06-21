<?php
class LoginController extends BaseController
{
	/**
	 * 登陆页面
	 *
	 * 
	 */
	public function index()
	{
		$data['msg'] = '';
		return View::make('login', array('msg' => $data));
	}

	/**
	 * 登陆验证
	 *
	 * 
	 */
	public function loginSuccess()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		$result = LoginModel::adminLogin($username, $password);
		if ($result) {
			Session::put('username', $username);
			return Redirect::action('AnnouncementController@index');
		} else {
			$data['msg'] = '用户名和密码不正确';
			return View::make('login', array('msg' => $data));
		}
	}

	/**
	 * 登出,清除SESSION
	 *
	 * 
	 */	
	public function logout()
	{
		Session::flush();
		return Redirect::action('LoginController@index');
	}

}