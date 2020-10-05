<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class Data_komikSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            'judul'      => 'Naruto',
            'slug'       => 'naruto',
            'sampul'     => 'naruto.jpg',
            'created_at' => Time::now(),
            'updated_at' => Time::now(),
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('data_komik')->insert($data);
    }
}
