<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class BooksSeeder extends Seeder
{

  public function run()
  {
    // seeding books
    $data = [
      [
        'title' => 'Atomic Habits',
        'slug' => 'atomic-habits',
        'author'    => 'James Clear',
        'publisher' => 'Gramedia',
        'cover'     => 'atomic-habits.jpg',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
      ],
      [
        'title' => 'Gelandangan Di Kampung Sendiri',
        'slug' => 'gelandangan-di-kampung-sendiri',
        'author'    => 'Emha Ainun Nadjib',
        'publisher' => 'Bentang Yogyakarta',
        'cover'     => 'gelandangan-di-kampung-sendiri.jpg',
        'created_at' => Time::now(),
        'updated_at' => Time::now()
      ]
    ];
    
    // $this->db->table('books')->insert($data);
    $this->db->table('books')->insertBatch($data);

    // seeding books using faker
    $faker = \Faker\Factory::create('id_ID');

    // using Faker
    for($i = 0; $i < 98; $i++) {
      $data = [
        'title' => $faker->sentence(3),
        'slug' => url_title($faker->sentence(3), '-', true),
        'author' => $faker->name(),
        'publisher' => $faker->company(),
        'cover' => 'default.jpg',
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];
      $this->db->table('books')->insert($data);
    }

  }
}