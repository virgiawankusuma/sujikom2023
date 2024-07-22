<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
    public function up()
    {
        $field = [
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'kategori_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'deskripsi_kegiatan' => [
                'type' => 'TEXT'
            ],
            'tanggal_kegiatan' => [
                'type' => 'DATE',
                'null' => true
            ],
            'batas_pendaftaran' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'link_pendaftaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'cover' => [
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
        $this->forge->addForeignKey('kategori_id', 'kategori_kegiatan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan');
    }
}
