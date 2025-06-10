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
			'merek'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50'
			],
			'harga' => [
				'type'           => 'BIGINT',
				'constraint'     => 50
			],
			'diskon' => [
				'type'           => 'INT',
				'constraint'     => 10
			],
			'deskripsi'      => [
				'type'           => 'TEXT',
			],
			'gambar'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'status_validasi_produk'      => [
				'type'           => 'INT',
				'constraint'     => '10',
				'default'		 => 1 // 1= menunggu validasi , 2=disetujui, 3= ditolak
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
