<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Corousel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'image' => [
                'type' => 'TEXT',
            ],
            'insert_at' => [
                'type' => 'DATETIME',
                'default' => new RawSql('(NOW())')
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('corousel');
    }

    public function down()
    {
        $this->forge->dropTable('corousel');
    }
}
