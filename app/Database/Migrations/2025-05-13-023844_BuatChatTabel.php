<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatChatTabel extends Migration
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
                'constraint'     => 11,
                'default'  => NULL
            ],
            'konsumen_id'       => [
                'type'           => 'INT',
                'constraint'     => 11,
                'default'  => NULL
            ],
            'pesan'      => [
                'type'           => 'TEXT',
            ],
            'waktu'      => [
                'type'           => 'TIMESTAMP',
                'default'  => NULL
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('chat', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('chat');
    }
}
