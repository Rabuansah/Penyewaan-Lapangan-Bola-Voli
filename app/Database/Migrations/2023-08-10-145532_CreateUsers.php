<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_users' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'no_hp' => [
                'type'          => 'VARCHAR',
                'constraint'    => '20',
            ],
            'role' => [
                'type'          => 'ENUM',
                'constraint'    => "'admin','user'",
                'default'       => 'user',
            ],
            //admin
            'gambar' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
                'default'       => 'default.png',

            ],
            'alamat' => [
                'type'          => 'TEXT',
                'null'          => true,
            ],
            'token' => [
                'type'          => 'VARCHAR',
                'constraint'    => '36',
                'null'          => true,
            ],
            'created_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'updated_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
            'deleted_at' => [
                'type'          => 'DATETIME',
                'null'          => true,
            ],
        ]);
        $this->forge->addKey('id_users', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
