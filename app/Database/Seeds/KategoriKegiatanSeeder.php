<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KategoriKegiatanSeeder extends Seeder
{
    public function run()
    {
        // seeding using faker
        $faker = \Faker\Factory::create('id_ID');

        // using Faker
        for($i = 0; $i < 5; $i++) {
            $data = [
                'nama_kategori' => $faker->sentence(1),
                'slug' => url_title($faker->sentence(3), '-', true),
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ];
            $this->db->table('kategori_kegiatan')->insert($data);
        }
    }
}
