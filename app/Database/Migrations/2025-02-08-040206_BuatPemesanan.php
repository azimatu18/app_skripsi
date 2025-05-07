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
				'constraint'     => 50,
				'default'		=> null
			],
			'no_surat_jalan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 50,
				'default'		=> null
			],
			'tanggal_dikirim' => [
				'type'           => 'date',
				'default'		=> null
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => 100
			],
			'catatan'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255
			],
			'total_harga' => [
				'type'           => 'BIGINT',
				'constraint'     => 50
			],
			'status_tipe' => [
				'type'           => 'INT',
				'constraint'     => 10,
				'default'		=> 1 // 1= menunggu pemabayaran, 2= menunggu konfirmasi pembayaran, 3= diproses, 4= dikirim, 5= selesai
			],
			'bukti_dp'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'default' => NULL
			],
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
