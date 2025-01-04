<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BuatUserTabel extends Migration
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
			'nama'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'password' => [
				'type'           => 'VARCHAR',
                'constraint'     => '255'
			],
			'level'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '15',
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
