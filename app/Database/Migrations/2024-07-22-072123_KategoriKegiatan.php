<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KategoriKegiatan extends Migration
{
    public function up()
    {
        $field = [
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama_kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ];
        $this->forge->addKey('id', true);

        $this->forge->addField($field);
        $this->forge->createTable('kategori_kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('kategori_kegiatan');
    }
}
