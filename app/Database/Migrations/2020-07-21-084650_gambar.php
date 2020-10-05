<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gambar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_gambar'			=> [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       	=> TRUE,
				'auto_increment' 	=> TRUE
			],
			'id_komik' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
			],
			'slug'	=> [
				'type'           => 'VARCHAR',
				'constraint'     => 250,
			],
			'gambar'	=> [
				'type'           => 'VARCHAR',
				'constraint'     => 250,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'    		 => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'    		 => TRUE,
			]
		]);
		$this->forge->addKey('id_gambar', TRUE);
		// $this->forge->addForeignKey('upload_id', 'uploads', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('gambar');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('gambar');
	}
}
