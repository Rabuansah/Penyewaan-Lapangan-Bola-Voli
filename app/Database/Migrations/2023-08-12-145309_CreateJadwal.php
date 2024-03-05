<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jadwal'     => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'start_hour'    => [
                'type'           => 'TIME',
            ],

            'end_hour'      => [
                'type'           => 'TIME',
            ],

            'tarif'         => [
                'type'           => 'BIGINT',
                'constraint'     => 100,
            ],

            'status'        => [
                'type'           => 'ENUM',
                'constraint'     => "'active','Nonactive'",
                'default'        => 'active',
            ],

            'created_at'    => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],

            'updated_at'    => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],

            'deleted_at'    => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],

        ]);
        $this->forge->addKey('id_jadwal');
        $this->forge->createTable('jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('jadwal');
    }
}
