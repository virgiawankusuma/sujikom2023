<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        // seeding books using faker
        $faker = \Faker\Factory::create('id_ID');

        // using Faker
        for($i = 0; $i < 10; $i++) {
            $data = [
                'nama_kegiatan' => $faker->sentence(3),
                'slug' => url_title($faker->sentence(3), '-', true),
                'tanggal_kegiatan' => $faker->date(),
                'tanggal_mulai' => $faker->date(),
                'batas_pendaftaran' => Time::createFromTimestamp($faker->unixTime()),
                'cover' => 'default.jpg',
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('kegiatan')->insert($data);
        }
    }
}
