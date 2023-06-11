<?php 
namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model{
    protected $table      = 'kegiatan';
    protected $useTimestamps = true;
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_kegiatan', 'slug', 'tanggal_kegiatan', 'tanggal_mulai', 'batas_pendaftaran', 'cover'];

    public function getKegiatan($slug = false) {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}