<?php

namespace App\Controllers;

use App\Models\ComicModel;

class comics extends BaseController
{
    protected $comicModel;
    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }
    public function index()
    {
        $comics = $this->comicModel->findAll();
        $data = [
            'judul' => 'Comics | Codeigniter',
            'comics' => $comics
        ];
        return view("comic/index", $data);
    }
}
