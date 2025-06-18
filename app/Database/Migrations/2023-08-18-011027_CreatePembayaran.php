<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran'         => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'id_penyewaan'         => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
            ],
            'jumlah'                => [
                'type'              => 'BIGINT'
            ],
            'token'                 => [
                'type'              => 'TEXT',
            ],
            'created_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],

            'updated_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],

            'deleted_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_penyewaan', 'penyewaan', 'id_penyewaan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran');
    }
}
