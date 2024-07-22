<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $userModel;
    protected $kegiatanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kegiatanModel = new KegiatanModel();
    }
 
    public function index(){
        $kegiatans = $this->kegiatanModel->getKegiatan();
        // dd($kegiatans);
        
        $data = [
            'title' => 'Home | Kegiatan',
            'kegiatans' => $kegiatans
        ];
        
        return view('kegiatan/index', $data);
    }

    public function detail($slug) {
        $kegiatan = $this->kegiatanModel->getKegiatan($slug);
        // dd($kegiatan);

        $data = [
        'title' => 'Detail | Kegiatan',
        'kegiatan' => $kegiatan
        ];

        if (empty($data['kegiatan'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Kegiatan ' . $slug . ' not found.');
        }

        return view('kegiatan/detail', $data);
    }
}
