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
        ];

        

        return view('auth/register', $data);
    }
    
    public function logout() {
        session()->remove('email');
        return redirect()->to('/login');
    }
}
