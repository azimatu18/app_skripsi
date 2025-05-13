<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatPemesananProduk extends Migration
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
			'pemesanan_id'       => [
				'type'           => 'INT',
				'constraint'     => 11
			],
			'produk_id'       => [
				'type'           => 'INT',
				'constraint'     => 11
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
			'jumlah'       => [
				'type'           => 'INT',
				'constraint'     => 11
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
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('pemesanan_produk', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan_produk');
    }
}
