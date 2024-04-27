<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Keuangan extends Seeder
{
    public $faker;

    public function run()
    {
        $this->faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'keterangan' => $this->faker->text,
                'nominal' => $this->faker->numberBetween(1000, 1000000),
                'jenis' => $this->faker->randomElement(['pemasukan', 'pengeluaran']),
                'tanggal' => $this->faker->date()
            ];
            $this->db->table('keuangan')->insert($data);
        }
    }
}
