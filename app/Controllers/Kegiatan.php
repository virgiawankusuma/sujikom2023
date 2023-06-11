<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $penggunaModel;
    protected $kegiatanModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->kegiatanModel = new KegiatanModel();
    }
 
    public function index(){
        $kegiatans = $this->kegiatanModel->getKegiatan();
        
        $data = [
            'title' => 'Home | Kegiatan',
            'kegiatans' => $kegiatans
        ];
        
        return view('kegiatan/index', $data);
    }

    public function detail($slug) {
        $kegiatan = $this->kegiatanModel->getKegiatan($slug);

        $data = [
        'title' => 'Detail | Kegiatan',
        'kegiatan' => $kegiatan
        ];

        // Jika buku tidak ada di tabel
        if (empty($data['kegiatan'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kegiatan ' . $slug . ' not found.');
        }

        return view('kegiatan/detail', $data);
    }
}
