<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Infaq extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'nominal' => [
                'type' => 'INT',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'tanggal' => [
                'type' => 'DATE'
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('keuangan');
    }

    public function down()
    {
        $this->forge->dropTable('keuangan');
    }
}
