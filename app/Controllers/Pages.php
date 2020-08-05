<?php

namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | Codeigniter'
		];
		return view("pages/home", $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About | Codeigniter'
		];
		return view("pages/about", $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact | Codeigniter',
			'addresses' => [
				[
					'type' => 'rumah',
					'road' => 'JL. Waru wani ruwet',
					'city' => 'Sidoarjo'
				], [
					'type' => 'kantor',
					'road' => 'JL. Lamongan Rusak',
					'city' => 'Surabaya'
				]
			]
		];
		return view("pages/contact", $data);
	}
}
