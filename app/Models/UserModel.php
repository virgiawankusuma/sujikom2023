<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = false;
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'tanggal_lahir', 'nomor_telepon', 'alamat', 'email', 'password'];

    public function getUser($email) {
        return $this->where(['email' => $email]);
    }
}
