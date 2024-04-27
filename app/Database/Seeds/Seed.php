<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed extends Seeder
{
    public function run()
    {
        $this->call('Operator');
        $this->call('Blog');
        $this->call('Keuangan');
        $this->call('Corousel');
        $this->call('RekeningMasjid');
        $this->call('Masjid');
    }
}
