<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getBuku($slug = false)
    {
        //jika tidak ada slug-> tampil semua
        if ($slug == false) {
            return $this->findAll();
        }
        //jika tidak slug tampil sesuai slug yang pertama
        return $this->where(['slug' => $slug])->first();
    }
}
