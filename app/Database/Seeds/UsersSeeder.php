<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    public function run()
    {
        
        $data = [
            [
                'nama' => 'Virgiawan Teguh Kusuma',
                'tanggal_lahir' => '2000-09-20',
                'nomor_telepon' => '081234567890',
                'alamat' => 'Jl. Raya Kedung Halang No. 1',
                'email' => 'virgiawanteguhkusuma@gmail.com',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
