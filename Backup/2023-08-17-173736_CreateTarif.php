<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTarif extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tarif'      => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_lapangan'   => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'start_hour'    => [
                'type'           => 'TIME',
            ],
            'end_hour'      => [
                'type'           => 'TIME',
            ],
            'rate'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);

        $this->forge->addPrimaryKey('id_tarif');
        $this->forge->addForeignKey('id_lapangan', 'lapangan', 'id_lapangan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tarif');
    }

    public function down()
    {
        $this->forge->dropTable('tarif');
    }
}
