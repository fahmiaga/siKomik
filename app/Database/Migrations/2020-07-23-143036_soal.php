<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Soal extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_soal'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_komik'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'soal' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'ja'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'jb' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'jc' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'jd' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'je' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'jBenar' => [
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
		$this->forge->addKey('id_soal', true);
		$this->forge->createTable('soal');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('soal');
	}
}
