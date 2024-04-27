<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masjid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'alamat' => [
                'type' => 'TEXT'
            ],
            'kontak' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'trailling_text' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('masjid');
    }

    public function down()
    {
        $this->forge->dropTable('masjid');
    }
}
