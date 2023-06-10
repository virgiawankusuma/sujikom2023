<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Books extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'publisher' => [
                'type' => 'VARCHAR',
                'constraint' => 128
            ],
            'cover' => [
                'type' => 'VARCHAR',
                'constraint' => 128
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
        $this->forge->addField($field);

        $this->forge->addKey('id', true);
        $this->forge->createTable('books');

    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
