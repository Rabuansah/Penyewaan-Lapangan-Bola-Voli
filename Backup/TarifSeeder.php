<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TarifSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_lapangan' => 1, // Ganti dengan id_lapangan yang sesuai
                'start_hour' => '06:00:00',
                'end_hour' => '18:00:00',
                'rate' => 60000,
            ],
            [
                'id_lapangan' => 1, // Ganti dengan id_lapangan yang sesuai
                'start_hour' => '18:00:00',
                'end_hour' => '24:00:00',
                'rate' => 75000,
            ],
            [
                'id_lapangan' => 2, // Ganti dengan id_lapangan yang sesuai
                'start_hour' => '06:00:00',
                'end_hour' => '18:00:00',
                'rate' => 60000,
            ],
            [
                'id_lapangan' => 2, // Ganti dengan id_lapangan yang sesuai
                'start_hour' => '06:00:00',
                'end_hour' => '18:00:00',
                'rate' => 75000,
            ],
            // Tambahkan data tarif lainnya sesuai kebutuhan
        ];

        $this->db->table('tarif')->insertBatch($data);
    }
}
