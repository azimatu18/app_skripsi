<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatProdukTabel extends Migration
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
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'tipe'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'harga' => [
				'type'           => 'BIGINT',
                'constraint'     => 50
			],
			'deskripsi'      => [
				'type'           => 'TEXT',
			],
			'gambar'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('produk', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
