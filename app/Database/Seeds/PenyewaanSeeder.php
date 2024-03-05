<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenyewaanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_users' => 1,
                'id_lapangan' => 1,
                'tanggal_penyewaan' => '2023-08-18',
                'kategori' => 'Putra',
            ],
            [
                'id_users' => 2,
                'id_lapangan' => 2,
                'tanggal_penyewaan' => '2023-08-19',
                'kategori' => 'Putri',
            ],
            // ... tambahkan data lainnya ...
        ];

        $this->db->table('penyewaan')->insertBatch($data);
    }
}
