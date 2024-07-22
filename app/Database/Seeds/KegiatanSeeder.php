<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        // seeding using faker
        $faker = \Faker\Factory::create('id_ID');

        // using Faker
        for($i = 0; $i < 5; $i++) {
            $data = [
                'nama_kegiatan' => $faker->sentence(3),
                'slug' => url_title($faker->sentence(3), '-', true),
                'kategori_id' => $faker->numberBetween(1, 5),
                'deskripsi_kegiatan' => $faker->paragraph(3),
                'tanggal_kegiatan' => $faker->date(),
                'batas_pendaftaran' => Time::createFromTimestamp($faker->unixTime()),
                'link_pendaftaran' => $faker->url,
                'cover' => 'default.jpg',
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('kegiatan')->insert($data);
        }

        $data_test = [
            [
                'nama_kegiatan' => 'Example Kegiatan',
                'slug' => 'example-slug',
                'kategori_id' => 1,
                'deskripsi_kegiatan' => 'Deskripsi kegiatan',
                'tanggal_kegiatan' => '2024-07-22',
                'batas_pendaftaran' => Time::now(),
                'link_pendaftaran' => 'https://example.com',
                'cover' => 'default.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        $this->db->table('kegiatan')->insertBatch($data_test);
    }
}
