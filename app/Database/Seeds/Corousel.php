<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Corousel extends Seeder
{
    public function run()
    {
        $data = [
            [
                'image' => '1714122777_ae30f00ffe19615b3178.jpg'
            ],
            [
                'image' => '1714122777_ae30f00ffe19615b3178.jpg'
            ],
            [
                'image' => '1714122777_ae30f00ffe19615b3178.jpg'
            ]
        ];

        $this->db->table('corousel')->insertBatch($data);
    }
}
