<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RekeningMasjid extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'nama_bank' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'kode_bank' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'nomor_rekening' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'atas_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('rekening_masjid');
    }

    public function down()
    {
        $this->forge->dropTable('rekening_masjid');
    }
}
