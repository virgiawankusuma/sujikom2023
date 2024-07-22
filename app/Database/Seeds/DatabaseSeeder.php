<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Panggil seeder lainnya di sini
        $this->call('UsersSeeder');
        $this->call('KategoriKegiatanSeeder');
        $this->call('KegiatanSeeder');
        // Tambahkan seeder lainnya sesuai kebutuhan
    }
}
