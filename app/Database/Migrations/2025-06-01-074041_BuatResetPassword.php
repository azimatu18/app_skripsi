<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatResetPassword extends Migration
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
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'token'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'waktu'      => [
                'type'           => 'TIMESTAMP',
                'default'  => NULL
            ]
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('reset_password', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('reset_password');
    }
}
