<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table      = 'pengguna';
    protected $useTimestamps = true;
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'tanggal_lahir', 'nomor_telepon', 'alamat', 'email', 'password'];

    public function getPengguna($email) {
        return $this->where(['email' => $email]);
    }
}
