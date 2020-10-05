<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'nama', 'foto', 'role_id'];

    public function getKomik()
    {
        return $this->findAll();
    }
    public function getUser($id)
    {
        return $this->where('id_user', $id)->first();
    }
}
