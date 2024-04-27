<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Masjid extends Seeder
{
    public function run()
    {
        $this->db->table('masjid')->insert([
            'alamat' => 'Jl. Toddopuli 7',
            'kontak' => '+62 819-1188-4342',
            'email' => 'admin@ittihad.com',
            'trailling_text' => 'Website ini masih dalam tahap pengembangan dan ini merupakan tampilan preview saja,data yang dipakai merupakan data dummy dan tidak merepresentasikan data real.'
        ]);
    }
}
