<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KegiatanModel;

class Admin extends BaseController
{

    protected $userModel;
    protected $kegiatanModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin | Kegiatan',
        ];

        return view('admin/index', $data);
    }

    public function kegiatan()
    {
        $kegiatans = $this->kegiatanModel->getKegiatan();

        $data = [
            'title' => 'Semua | Kegiatan',
            'kegiatans' => $kegiatans
        ];

        return view('admin/kegiatan', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah | Kegiatan',
            'errors' => validation_errors()
        ];

        return view('admin/create', $data);
    }

    private function __saveValidation()
    {
        $validationRules = [
            'nama_kegiatan' => [
                'rules' => 'required|is_unique[kegiatan.nama_kegiatan]',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.',
                    'is_unique' => '{field} Kegiatan already exists'
                ]
            ],
            'tanggal_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
            'tanggal_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
            'batas_pendaftaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput();
        }
    }

    public function save()
    {
        // validation
        $this->__saveValidation();

        $inputData = [
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'slug' => url_title($this->request->getVar('nama_kegiatan'), '-', true),
            'tanggal_kegiatan' => $this->request->getVar('tanggal_kegiatan'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'batas_pendaftaran' => $this->request->getVar('batas_pendaftaran'),
        ];
        // dd($inputData);

        $this->kegiatanModel->save($inputData);

        session()->setFlashdata('message', 'Kegiatan has been added.');

        return redirect()->to('/admin/kegiatan');
    }


    public function delete($id)
    {

        $this->kegiatanModel->delete($id);

        session()->setFlashdata('message', 'Kegiatan has been deleted.');

        return redirect()->to('/admin/kegiatan');
    }

    public function edit($slug) {
        $data = [
          'title' => 'Edit | Kegiatan',
          'kegiatan' => $this->kegiatanModel->getKegiatan($slug),
          'errors' => validation_errors()
        ];
    
        return view('admin/edit', $data);
    }

    private function __updateValidation($ruleTitle)
    {
        $validationRules = [
            'nama_kegiatan' => [
                'rules' => $ruleTitle,
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.',
                    'is_unique' => '{field} Kegiatan already exists'
                ]
            ],
            'tanggal_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
            'tanggal_mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
            'batas_pendaftaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput();
        }
    }

    public function update($id) {
        // cek judul
        $kegiatanOld = $this->kegiatanModel->getKegiatan($this->request->getVar('slug'));
        // dd($kegiatanOld);
    
        if($kegiatanOld['nama_kegiatan'] == $this->request->getVar('nama_kegiatan')) {
          $ruleTitle = 'required';
        } else {
          $ruleTitle = 'required|is_unique[kegiatan.nama_kegiatan]';
        }
    
        // validation
        $this->__updateValidation($ruleTitle);
    
        $slug = url_title($this->request->getVar('nama_kegiatan'), '-', true);
        $inputData = [
            'id' => $id,
            'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
            'slug' => $slug,
            'tanggal_kegiatan' => $this->request->getVar('tanggal_kegiatan'),
            'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
            'batas_pendaftaran' => $this->request->getVar('batas_pendaftaran'),
        ];
        $this->kegiatanModel->save($inputData);
    
        session()->setFlashdata('message', 'Kegiatan has been added.');

        return redirect()->to('/admin/kegiatan');
    }
}
