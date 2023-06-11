<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{

    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if(session()->get('email')) {
            return redirect()->to('/admin');
        } 
        
        $data = [
            'title'=> 'Login | Kegiatan',
        ];

        return view('auth/login', $data);
    }

    public function login() {
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $user = $this->userModel->getUser($email)->first();
        
        // dd($user);
        if($user) {
            if (password_verify($password, $user['password'])) {
                $session_login = [
                    'email' => $user['email'],
                ];
                session()->set($session_login);
    
                session()->setFlashdata('message', 'Welcome back, ' . $user['nama']);
    
                return redirect()->to('/admin');
            } else {
                session()->setFlashdata('errorMessage', 'Password incorrect');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('errorMessage', 'Email not registered');
            return redirect()->to('/login');
        }

    }

    public function register()
    {
        $data = [
            'title' => 'Register | Kegiatan',
            'errors' => validation_errors(),
        ];

        return view('auth/register', $data);
    }

    public function saveRegister()
    {
        $validationRules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} cannot be blank.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]|valid_email',
                'errors' => [
                    'required' => '{field} cannot be blank.',
                    'is_unique' => '{field} already registered.',
                    'valid_email' => '{field} must be a valid email address.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|matches[repassword]',
                'errors' => [
                    'required' => '{field} cannot be blank.',
                    'min_length' => '{field} must be at least 8 characters.',
                    'matches' => '{field} does not match.'
                ]
            ],
            'repassword' => [
                'rules' => 'required|min_length[8]|matches[password]',
                'errors' => [
                    'required' => '{field} cannot be blank.',
                    'min_length' => '{field} must be at least 8 characters.',
                    'matches' => '{field} does not match.'
                ]
            ],
        ];

        if ($this->validate($validationRules)) {
            $inputData = [
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'repassword' => password_hash($this->request->getVar('repassword'), PASSWORD_DEFAULT),
            ];

            $this->userModel->save($inputData);

            session()->setFlashdata('message', 'Registration success, please login.');

            return redirect()->to('/login');
        } else {
            return redirect()->back()->withInput();
        }
    }
    
    public function logout() {
        session()->remove('email');
        return redirect()->to('/login');
    }
}
