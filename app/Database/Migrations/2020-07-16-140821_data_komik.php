<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKomik extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_komik'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'judul'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'sampul' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'    		 => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'    		 => TRUE,
			],
		]);
		$this->forge->addKey('id_komik', true);
		$this->forge->createTable('data_komik');
	}

	public function down()
	{
		$this->forge->dropTable('data_komik');
	}
}
