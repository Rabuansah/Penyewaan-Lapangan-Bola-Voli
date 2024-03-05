<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyewaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyewaan'          => [
                'type'                  => 'BIGINT',
                'constraint'            => 20,
                'unsigned'              => true,
                'auto_increment'        => true
            ],
            'id_users'              => [
                'type'                  => 'BIGINT',
                'constraint'            => 20,
                'unsigned'              => true
            ],
            'id_lapangan'           => [
                'type'                  => 'BIGINT',
                'constraint'            => 20,
                'unsigned'              => true
            ],
            'tanggal_penyewaan'     => [
                'type'                  => 'DATE'
            ],
            'kategori'              => [
                'type'                  => 'ENUM',
                'constraint'            => "'Putra','Putri'",
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
        $this->forge->addKey('id_penyewaan', true);
        $this->forge->addForeignKey('id_users', 'users', 'id_users', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_lapangan', 'lapangan', 'id_lapangan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penyewaan');
    }

    public function down()
    {
        $this->forge->dropTable('penyewaan');
    }
}
