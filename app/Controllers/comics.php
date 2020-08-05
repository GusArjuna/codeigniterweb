<?php

namespace App\Controllers;

class comics extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Comics | Codeigniter'
        ];
        return view("comic/index", $data);
    }
}
