<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatKeranjangTabel extends Migration
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
			'produk_id'      => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'jumlah' => [
				'type'           => 'INT',
                'constraint'     => 11
			]
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('keranjang', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('keranjang');
    }
}
