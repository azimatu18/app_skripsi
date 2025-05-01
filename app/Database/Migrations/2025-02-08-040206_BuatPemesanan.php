<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatPemesanan extends Migration
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
			'konsumen'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 50
			],
			'no_hp'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 20
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'no_faktur' => [
				'type'           => 'VARCHAR',
                'constraint'     => 50
			],
			'no_po' => [
				'type'           => 'VARCHAR',
                'constraint'     => 50
			],
			'alamat' => [
				'type'           => 'VARCHAR',
                'constraint'     => 100
			],
			'catatan'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('pemesanan', TRUE);
    
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}
