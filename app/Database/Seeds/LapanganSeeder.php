<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LapanganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lapangan' => 'Lapangan A',
                'deskripsi' => 'Lapangan bola voli dengan dasar lantai semen yang dapat digunakan oleh Pria dan Wanita',
            ],
            [
                'nama_lapangan' => 'Lapangan B',
                'deskripsi' => 'Lapangan bola voli dengan dasar lantai semen yang dapat digunakan oleh Pria dan Wanita',
            ]
        ];
        $this->db->table('lapangan')->insertBatch($data);
    }
}
