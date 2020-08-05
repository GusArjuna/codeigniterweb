<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		return view("layout/header");
		return view("pages/home");
		return view("layout/footer");
	}

	public function about()
	{
		return view("layout/header");
		return view("pages/about");
		return view("layout/footer");
	}
}
