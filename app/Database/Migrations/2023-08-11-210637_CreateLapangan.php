<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLapangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_lapangan' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lapangan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '100',
            ],
            'gambar' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'default'       => 'lapangan.jpeg',
            ],
            'deskripsi' => [
                'type'          => 'TEXT',
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
        $this->forge->addKey('id_lapangan', true);
        $this->forge->createTable('lapangan');
    }

    public function down()
    {
        $this->forge->dropTable('lapangan');
    }
}
