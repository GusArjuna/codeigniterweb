<?php

namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table      = 'comic';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'slug', 'creator', 'publisher', 'cover'];
    public function getComic($slug = false)
    {
        if (!$slug) {
            return $this->findAll();
        } else {
            return $this->where(['slug' => $slug])->first();
        }
    }
}
