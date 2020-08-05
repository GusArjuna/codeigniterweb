<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Comics extends BaseController
{
    protected $comicModel;
    public function __construct()
    {
        $this->comicModel = new ComicModel();
    }
    public function index()
    {
        // $comics = $this->comicModel->findAll();
        $data = [
            'title' => 'Comics | Codeigniter',
            'comics' => $this->comicModel->getComic()
        ];
        return view("comic/index", $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail | Codeigniter',
            'comics' => $this->comicModel->getComic($slug)
        ];
        return view("comic/detail", $data);
    }
}
