<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatValidasiDokumen extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'pemesanan_id'      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tipe_dokumen'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'status_dokumen'      => [
                'type'           => 'INT',
                'constraint' => 10,
                'default'  => 1 //1=menunggu 2=disetujui 3=ditolak
            ],
            'alasan'  => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('validasi_dokumen', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('validasi_dokumen');
    }
}
