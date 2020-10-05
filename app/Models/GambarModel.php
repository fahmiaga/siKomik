<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class GambarModel extends Model
{
    protected $table = 'gambar';
    protected $primaryKey = 'id_gambar';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_komik', 'slug', 'gambar'];


    public function getGambar($slug)
    {
        return $this->where('slug', $slug)->findAll();
    }
    public function getDataGambar($id)
    {
        return $this->where(['id_gambar' => $id])->first();
    }
}
