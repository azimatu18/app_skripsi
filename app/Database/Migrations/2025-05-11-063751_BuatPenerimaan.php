<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatPenerimaan extends Migration
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
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'pemesanan_id'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'fungsi'      => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
            'training'      => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
            'saran'      => [
                'type'           => 'TEXT',
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('penerimaan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('penerimaan');
    }
}
