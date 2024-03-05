<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenyewaanJadwal extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyewaan_jadwal'          => [
                'type'                  => 'BIGINT',
                'constraint'            => 20,
                'unsigned'              => true,
                'auto_increment'        => true
            ],
            'id_penyewaan'              => [
                'type'                  => 'BIGINT',
                'constraint'            => 20,
                'unsigned'              => true
            ],
            'id_jadwal'           => [
                'type'                  => 'BIGINT',
                'constraint'            => 20,
                'unsigned'              => true
            ],
        ]);
        $this->forge->addKey('id_penyewaan_jadwal', true);
        $this->forge->addForeignKey('id_penyewaan', 'penyewaan', 'id_penyewaan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_jadwal', 'jadwal', 'id_jadwal', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penyewaan_jadwal');
    }

    public function down()
    {
        $this->forge->dropTable('penyewaan_jadwal');
    }
}
