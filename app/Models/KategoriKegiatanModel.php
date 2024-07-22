<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriKegiatanModel extends Model
{
    protected $table      = 'kategori_kegiatan';
    protected $useTimestamps = true;
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_kategori', 'slug'];

    public function getKategori($slug = false) {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
