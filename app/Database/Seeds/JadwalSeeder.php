<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'start_hour'    => '00:00:00',
                'end_hour'      => '02:00:00',
                'tarif'         => '150000',
                'status'        => 'nonactive',
            ],
            [
                'start_hour'    => '02:00:00',
                'end_hour'      => '04:00:00',
                'tarif'         => '150000',
                'status'        => 'nonactive',
            ],
            [
                'start_hour'    => '04:00:00',
                'end_hour'      => '06:00:00',
                'tarif'         => '120000',
                'status'        => 'nonactive',
            ],
            [
                'start_hour'    => '06:00:00',
                'end_hour'      => '08:00:00',
                'tarif'         => '120000',
                'status'        => 'nonactive',
            ],
            [
                'start_hour'    => '08:00:00',
                'end_hour'      => '10:00:00',
                'tarif'         => '120000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '10:00:00',
                'end_hour'      => '12:00:00',
                'tarif'         => '120000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '12:00:00',
                'end_hour'      => '14:00:00',
                'tarif'         => '120000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '14:00:00',
                'end_hour'      => '16:00:00',
                'tarif'         => '120000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '16:00:00',
                'end_hour'      => '18:00:00',
                'tarif'         => '120000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '18:00:00',
                'end_hour'      => '20:00:00',
                'tarif'         => '150000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '20:00:00',
                'end_hour'      => '22:00:00',
                'tarif'         => '150000',
                'status'        => 'active',
            ],
            [
                'start_hour'    => '22:00:00',
                'end_hour'      => '24:00:00',
                'tarif'         => '150000',
                'status'        => 'nonactive',
            ],

        ];
        $this->db->table('jadwal')->insertBatch($data);
    }
}
