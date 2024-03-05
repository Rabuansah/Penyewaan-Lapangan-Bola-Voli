<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'    => 'admin',
                'email'       => 'admin@example.com',
                'password'    => password_hash('admin123', PASSWORD_BCRYPT),
                'no_hp'       => '123456789',
                'alamat'      => '123 Main Street, City',
                'token'      => '1234567890',
            ],
            [
                'username'    => 'user1',
                'email'       => 'user1@example.com',
                'password'    => password_hash('user123', PASSWORD_BCRYPT),
                'no_hp'       => '987654321',
                'alamat'      => '456 First Avenue, Town',
                'token'      => '1234567890',
            ],
            // Add more user data here if needed
        ];

        // Using the DB class to insert data
        $this->db->table('users')->insertBatch($data);
    }
}
