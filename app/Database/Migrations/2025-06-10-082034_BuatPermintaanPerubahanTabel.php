<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatPermintaanPerubahanTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
                'auto_increment'=> true
            ],
            'produk_id'         => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'status'            => [
                'type'          => 'INT',
                'constraint'    => '10',
                'default'       => 1 // 1= menunggu validasi, 2=disetujui, 3=ditolak
            ],
            'data_baru'         => [
                'type'          => 'TEXT',
            ],
            'alasan_penolakan'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'waktu'             => [
                'type'          => 'TIMESTAMP',
                'default'       => NULL
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('permintaan_perubahan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('permintaan_perubahan');
    }
}
