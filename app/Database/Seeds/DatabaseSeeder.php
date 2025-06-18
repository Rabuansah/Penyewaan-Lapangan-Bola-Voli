<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('CreateUsersSeeder');
        $this->call('LapanganSeeder');
        $this->call('JadwalSeeder');
        $this->call('PenyewaanSeeder');
    }
}
