<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id_soal';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_komik', 'soal', 'slug', 'ja', 'jb', 'jc', 'jd', 'je', 'jBenar'];

    public function getDataSoal($slug)
    {
        return $this->where(['slug' => $slug])->findAll();
    }
    public function getSoal($id)
    {
        return $this->where(['id_soal' => $id])->first();
    }
}
