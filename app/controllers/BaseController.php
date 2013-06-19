<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

/*	protected function returnJson(array $result = array())
	{
		return Response::json($result);
	}*/

	protected function successJson($array = array())
	{
		$result = array(
			'success' => 1,
			'data' => $array
		);

		return Response::json($result);
	}

	protected function errorJson($array = array())
	{
		$result = array(
			'success' => 0,
			'data' => $array
		);

		return Response::json($result);
	}

}