<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Laporan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'month' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('(NOW())')
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('laporan');
    }

    public function down()
    {
        $this->forge->dropTable('laporan');
    }
}
