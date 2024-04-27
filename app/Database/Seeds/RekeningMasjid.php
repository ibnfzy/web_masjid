<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RekeningMasjid extends Seeder
{
    public function run()
    {
        $this->db->table('rekening_masjid')->insert([
            'nama_bank' => 'Bank Mandiri',
            'kode_bank' => '3212',
            'nomor_rekening' => '1234567890',
            'atas_nama' => 'Masjid Jami Al Ittihad',
        ]);

        $this->db->table('rekening_masjid')->insert([
            'nama_bank' => 'Bank BRI',
            'kode_bank' => '3212',
            'nomor_rekening' => '0987654321',
            'atas_nama' => 'Masjid Jami Al Ittihad',
        ]);
    }
}
