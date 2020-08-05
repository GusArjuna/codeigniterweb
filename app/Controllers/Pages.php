<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'judul' => 'Home | Codeigniter'
		];
		return view("pages/home", $data);
	}

	public function about()
	{
		$data = [
			'judul' => 'About | Codeigniter'
		];
		return view("pages/about", $data);
	}
}
