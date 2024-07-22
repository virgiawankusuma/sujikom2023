<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KegiatanModel;
use App\Models\KategoriKegiatanModel;

class Admin extends BaseController
{

    protected $userModel;
    protected $kegiatanModel;
    protected $kategoriKegiatanModel;
    protected $user;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->kategoriKegiatanModel = new KategoriKegiatanModel();
        $this->user = $this->userModel->getUser(session()->get('email'))->first();
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
        
        return view('admin/kegiatan/index', $data);
    }
    
    public function create()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Tambah | Kegiatan',
            'errors' => validation_errors(),
            'user' => $this->user,
            'kategori' => $this->kategoriKegiatanModel->findAll()
        ];
        
        return view('admin/kegiatan/create', $data);
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
            'kategori_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
            'deskripsi_kegiatan' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.',
                ]
            ],
            'tanggal_kegiatan' => [
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
            'link_pendaftaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
        ];

        if ($this->validate($validationRules)) {
            $inputData = [
                'nama_kegiatan' => $this->request->getVar('nama_kegiatan'),
                'kategori_id' => (int)$this->request->getVar('kategori_kegiatan'),
                'deskripsi_kegiatan' => $this->request->getVar('deskripsi_kegiatan'),
                'slug' => url_title($this->request->getVar('nama_kegiatan'), '-', true),
                'tanggal_kegiatan' => $this->request->getVar('tanggal_kegiatan'),
                'batas_pendaftaran' => $this->request->getVar('batas_pendaftaran'),
                'link_pendaftaran' => $this->request->getVar('link_pendaftaran'),
            ];

            // dd($inputData);
    
            $this->kegiatanModel->save($inputData);
            
            session()->setFlashdata('messageSuccess', 'Kegiatan has been added.');
    
            return redirect()->to('/admin/kegiatan');
        } else {
            return redirect()->back()->withInput();
        }

    }

    public function delete($id)
    {

        $this->kegiatanModel->delete($id);

        session()->setFlashdata('messageSuccess', 'Kegiatan has been deleted.');

        return redirect()->to('/admin/kegiatan');
    }

    public function edit($slug) {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }

        // dd($this->kegiatanModel->getKegiatan($slug));
        
        $data = [
          'title' => 'Edit | Kegiatan',
          'kegiatan' => $this->kegiatanModel->getKegiatan($slug),
          'errors' => validation_errors(),
          'user' => $this->user,
          'kategori' => $this->kategoriKegiatanModel->findAll()
        ];
    
        return view('admin/kegiatan/edit', $data);
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
            'kategori_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.'
                ]
            ],
            'deskripsi_kegiatan' => [
                'rules' => 'required|',
                'errors' => [
                    'required' => '{field} Kegiatan cannot be blank.',
                ]
            ],
            'tanggal_kegiatan' => [
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
            'link_pendaftaran' => [
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
                'kategori_id' => (int)$this->request->getVar('kategori_kegiatan'),
                'deskripsi_kegiatan' => $this->request->getVar('deskripsi_kegiatan'),
                'slug' => $slug,
                'tanggal_kegiatan' => $this->request->getVar('tanggal_kegiatan'),
                'batas_pendaftaran' => $this->request->getVar('batas_pendaftaran'),
                'link_pendaftaran' => $this->request->getVar('link_pendaftaran'),
            ];
            $this->kegiatanModel->save($inputData);
        
            session()->setFlashdata('messageSuccess', 'Kegiatan has been updated.');
        } else {
            return redirect()->back()->withInput();
        }
    

        return redirect()->to('/admin/kegiatan');
    }

    public function kategori()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Kategori | Kegiatan',
            'kategoris' => $this->kategoriKegiatanModel->findAll(),
            'user' => $this->user
        ];
        
        return view('admin/kategori/index', $data);
    }

    public function kategori_create()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
            'title' => 'Tambah | Kategori',
            'errors' => validation_errors(),
            'user' => $this->user
        ];
        
        return view('admin/kategori/create', $data);
    }

    public function kategori_save()
    {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        // validation
        $validationRules = [
            'nama_kategori' => [
                'rules' => 'required|is_unique[kategori_kegiatan.nama_kategori]',
                'errors' => [
                    'required' => '{field} Kategori cannot be blank.',
                    'is_unique' => '{field} Kategori already exists'
                ]
            ]
        ];

        if ($this->validate($validationRules)) {
            $inputData = [
                'nama_kategori' => $this->request->getVar('nama_kategori'),
                'slug' => url_title($this->request->getVar('nama_kategori'), '-', true),
            ];
    
            $this->kategoriKegiatanModel->save($inputData);
            
            session()->setFlashdata('messageSuccess', 'Kategori has been added.');
    
            return redirect()->to('/admin/kategori');
        } else {
            return redirect()->back()->withInput();
        }
    }

    public function kategori_delete($id)
    {
        // cek dengan relasi kegiatan
        if ($this->kegiatanModel->where('kategori_id', $id)->countAllResults() > 0) {
            session()->setFlashdata('messageError', 'Kategori cannot be deleted because it is used in the activity.');
            return redirect()->to('/admin/kategori');
        }

        $this->kategoriKegiatanModel->delete($id);

        session()->setFlashdata('messageSuccess', 'Kategori has been deleted.');

        return redirect()->to('/admin/kategori');
    }

    public function kategori_edit($slug) {
        if (is_logged_in() === false) {
            return redirect()->to('/login');
        }
        
        $data = [
          'title' => 'Edit | Kategori',
          'kategori' => $this->kategoriKegiatanModel->getKategori($slug),
          'errors' => validation_errors(),
          'user' => $this->user
        ];
    
        return view('admin/kategori/edit', $data);
    }

    public function kategori_update($id) {
        // cek judul
        $kategoriOld = $this->kategoriKegiatanModel->getKategori($this->request->getVar('slug'));
    
        if($kategoriOld['nama_kategori'] == $this->request->getVar('nama_kategori')) {
          $ruleTitle = 'required';
        } else {
          $ruleTitle = 'required|is_unique[kategori_kegiatan.nama_kategori]';
        }
    
        // validation
        $validationRules = [
            'nama_kategori' => [
                'rules' => $ruleTitle,
                'errors' => [
                    'required' => '{field} Kategori cannot be blank.',
                    'is_unique' => '{field} Kategori already exists'
                ]
            ]
        ];

        if ($this->validate($validationRules)) {
            $slug = url_title($this->request->getVar('nama_kategori'), '-', true);
            $inputData = [
                'id' => $id,
                'nama_kategori' => $this->request->getVar('nama_kategori'),
                'slug' => $slug,
            ];
            $this->kategoriKegiatanModel->save($inputData);
        
            session()->setFlashdata('messageSuccess', 'Kategori has been updated.');
        } else {
            return redirect()->back()->withInput();
        }
    

        return redirect()->to('/admin/kategori');
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
            $this->userModel->save([
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
                'nomor_telepon' => $this->request->getVar('nomor_telepon'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
            ]);

            session()->setFlashdata('messageSuccess', 'Profile has been updated.');

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
            $this->userModel->save([
                'id' => $id,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);

            session()->setFlashdata('messageSuccess', 'Password has been updated.');

            return redirect()->to('/admin/ubah-password');
        } else {
            return redirect()->back()->withInput();
        }
    }
}
