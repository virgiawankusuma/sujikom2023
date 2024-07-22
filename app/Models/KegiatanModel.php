<?php 
namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model{
    protected $table      = 'kegiatan';
    protected $useTimestamps = true;
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_kegiatan', 'slug', 'kategori_id', 'deskripsi_kegiatan', 'tanggal_kegiatan', 'batas_pendaftaran', 'link_pendaftaran', 'cover'];

    // kegiatan join kategori_kegiatan
    public function getKegiatan($slug = false) {
        if ($slug == false) {
            return $this->db->query("SELECT kegiatan.*, kategori_kegiatan.nama_kategori FROM kegiatan JOIN kategori_kegiatan ON kategori_kegiatan.id = kegiatan.kategori_id")->getResultArray();
        }
        
        return $this->db->query("SELECT kegiatan.*, kategori_kegiatan.nama_kategori FROM kegiatan JOIN kategori_kegiatan ON kategori_kegiatan.id = kegiatan.kategori_id WHERE kegiatan.slug = '$slug'")->getRowArray();
    }
}