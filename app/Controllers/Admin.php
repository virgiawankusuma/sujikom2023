<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;
use App\Models\PenggunaModel;

class Admin extends BaseController
{

    protected $penggunaModel;
    protected $kegiatanModel;
    protected $user;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->user = $this->penggunaModel->getPengguna(session()->get('email'))->first();
    }
    
    public function index()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Admin | Kegiatan',
            'user' => $this->user
        ];
        return view('admin/index', $data);
    }
    
    public function kegiatan()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $kegiatans = $this->kegiatanModel->getKegiatan();
        
        $data = [
            'title' => 'Semua | Kegiatan',
            'kegiatans' => $kegiatans,
            'user' => $this->user
        ];
        
        return view('admin/kegiatan', $data);
    }
    
    public function create()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Tambah | Kegiatan',
            'errors' => validation_errors(),
            'user' => $this->user
        ];
        
        return view('admin/create', $data);
    }

    public function save()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        // validation
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

        if ($this->validate($validationRules)) {
            $inputData = [
                'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
                'slug' => url_title($this->request->getVar('nama_kegiatan'), '-', true),
                'tanggal_kegiatan' => $this->request->getVar('tanggal_kegiatan'),
                'tanggal_mulai' => $this->request->getVar('tanggal_mulai'),
                'batas_pendaftaran' => $this->request->getVar('batas_pendaftaran'),
            ];
    
            $this->kegiatanModel->save($inputData);
            
            session()->setFlashdata('message', 'Kegiatan has been added.');
    
            return redirect()->to('/admin/kegiatan');
        } else {
            return redirect()->back()->withInput();
        }

    }

    public function delete($id)
    {

        $this->kegiatanModel->delete($id);

        session()->setFlashdata('message', 'Kegiatan has been deleted.');

        return redirect()->to('/admin/kegiatan');
    }

    public function edit($slug) {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
          'title' => 'Edit | Kegiatan',
          'kegiatan' => $this->kegiatanModel->getKegiatan($slug),
          'errors' => validation_errors(),
          'user' => $this->user
        ];
    
        return view('admin/edit', $data);
    }

    public function update($id) {
        // cek judul
        $kegiatanOld = $this->kegiatanModel->getKegiatan($this->request->getVar('slug'));
    
        if($kegiatanOld['nama_kegiatan'] == $this->request->getVar('nama_kegiatan')) {
          $ruleTitle = 'required';
        } else {
          $ruleTitle = 'required|is_unique[kegiatan.nama_kegiatan]';
        }
    
        // validation
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

        if ($this->validate($validationRules)) {
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
        } else {
            return redirect()->back()->withInput();
        }
    

        return redirect()->to('/admin/kegiatan');
    }

    public function profile()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Profile | Admin',
            'user' => $this->user,
            'errors' => validation_errors()
        ];
        
        return view('admin/profile', $data);
    }

    public function updateProfile()
    {   
        $validationRules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be blank.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} cannot be blank.',
                    'valid_email' => '{field} must be a valid email address.'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be blank.'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required|max_length[13]',
                'errors' => [
                    'required' => '{field} cannot be blank.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be blank.'
                ]
            ]
        ];

        if ($this->validate($validationRules)) {
            // dd($this->request->getVar());
            $id = $this->request->getVar('id');
            $this->penggunaModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'nomor_telepon' => $this->request->getVar('nomor_telepon'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
            ]);

            session()->setFlashdata('message', 'Profile has been updated.');

            return redirect()->to('/admin/profil');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function changePassword()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Ubah Password | Admin',
            'user' => $this->user,
            'errors' => validation_errors()
        ];
        
        return view('admin/change-password', $data);
    }

    public function updatePassword()
    {
        $validationRules = [
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => '{field} cannot be blank.',
                    'min_length' => '{field} must be at least 8 characters.'
                ]
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} cannot be blank.',
                    'matches' => '{field} must be the same as password.'
                ]
            ]
        ];

        if ($this->validate($validationRules)) {
            $id = $this->request->getVar('id');
            $this->penggunaModel->save([
                'id' => $id,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);

            session()->setFlashdata('message', 'Password has been updated.');

            return redirect()->to('/admin/ubah-password');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
