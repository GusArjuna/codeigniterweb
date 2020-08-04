<?php

namespace App\Controllers;

class Trys extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function about($params = '')
	{
		echo "Hello world $params";
	}

	//--------------------------------------------------------------------

}
