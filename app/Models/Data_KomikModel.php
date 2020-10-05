<?php

namespace App\Models;

use CodeIgniter\Model;

class Data_KomikModel extends Model
{
    protected $table = 'data_komik';
    protected $primaryKey = 'id_komik';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'sampul'];

    public function getKomik($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function getKomikLimit()
    {
        // $db      = \Config\Database::connect();
        $builder = $this->db->table('data_komik');
        $builder->orderBy('id_komik', 'DESC');
        $builder->limit(6);
        return $builder->get();
    }
    public function search($keyword)
    {
        // $builder = $this->table('komik');
        // $builder->like('judul', $keyword);
        // return $builder;
        return $this->table('orang')->like('judul', $keyword);
    }
}
