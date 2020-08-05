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
        session();
        // $comics = $this->comicModel->findAll();
        $data = [
            'title' => 'Comics | Codeigniter',
            'comics' => $this->comicModel->getComic(),
            'validation' => \Config\Services::validation()
        ];
        return view("comic/index", $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail | Codeigniter',
            'comics' => $this->comicModel->getComic($slug)
        ];

        // jika comic tidak ada di table
        if (empty($data['comics'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('comic ' . $slug . ' is Not Found');
        }
        return view("comic/detail", $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'titlecomic' => [
                'rules' => 'required|is_unique[comic.title]',
                'errors' => [
                    'required' => 'Title Must be filled',
                    'is_unique' => 'Title ever been Added'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/comics')->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('titlecomic'), '-', true);
        $this->comicModel->save([
            'title' => $this->request->getVar('titlecomic'),
            'slug' => $slug,
            'creator' => $this->request->getVar('creatorcomic'),
            'publisher' => $this->request->getVar('publishercomic'),
            'cover' => $this->request->getVar('covercomic')
        ]);
        session()->setFlashdata('message', 'Data Added');

        return redirect()->to('/comics');
    }
}
