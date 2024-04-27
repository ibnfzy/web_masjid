<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Blog extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'title' => $faker->sentence,
                'category' => $faker->randomElement(['lembaga', 'layanan', 'inventaris', 'tausiyah', 'agenda']),
                'content' => $faker->paragraph,
                'image' => 'MASJID.png',
            ];
        }

        $this->db->table('blog')->insertBatch($data);
    }
}
