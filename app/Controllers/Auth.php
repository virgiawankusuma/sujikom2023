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
        $data = [
            'title'=> 'Login | Kegiatan',
        ];

        return view('auth/login', $data);
    }

    public function login() {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // $user = $this->db->get_where('user', ['email' => $email])->row();
        $user = $this->userModel->getUser($email)->find();

        dd($user);

        if (password_verify($password, $user->password)) {
            $sess = [
                'email' => $user->email,
                'role_id' => $user->role_id
            ];

            session()->set_userdata($sess);
            // $this->session->set_userdata($sess);
            return redirect()->back()->withInput();
        }

        dd($email, $password);
    }

    public function register()
    {
        $data = [
            'title'=> 'Register | Kegiatan',
        ];

        return view('auth/register', $data);
    }
    
}
