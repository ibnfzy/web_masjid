<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Operator extends Seeder
{
    public function run()
    {
        $this->db->table('operator')->insert([
            'email' => 'admin@alittihad.com',
            'password' => password_hash('admin', PASSWORD_BCRYPT),
        ]);
    }
}