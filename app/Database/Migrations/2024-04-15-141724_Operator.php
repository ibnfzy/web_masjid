<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Operator extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'password' => [
                'type' => 'TEXT'
            ],
            'last_login' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('operator');
    }

    public function down()
    {
        $this->forge->dropTable('operator');
    }
}