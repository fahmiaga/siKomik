<?php

namespace App\Controllers;

use App\Models\Data_KomikModel;
use App\Models\GambarModel;
use App\Models\SoalModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->komikModel = new Data_KomikModel();
        $this->gambarModel = new GambarModel();
        $this->soalModel = new SoalModel();
        $this->userModel = new UserModel();
        // dd(session()->get('email'));

    }
    public function create()
    {
        $data = [
            'title' => 'Form Registrasi',
            'validation' => \Config\Services::validation()
        ];
        return view('dataUser/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password' => [
                'rules' => 'required|matches[passwordConfirm]',
                'errors' => [
                    'matches' => '{field} tidak sama',
                    'required' => '{field} harus diisi.',
                ]
            ],
            'passwordConfirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'matches' => '{field} tidak sama',
                    'required' => '{field} harus diisi.',
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/auth/create')->withInput();
        }
        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'password' => $this->request->getVar('password'),
            'foto' => 'defaultUser.jpg',
            'role_id' => 1,
        ]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Registrasi berhasil, silahkan login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/auth/login');
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/index', $data);
    }
    public function prosesLogin()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/auth/login')->withInput();
        }

        $db      = \Config\Database::connect();
        // $session = session();
        $bulider = $db->table('user');


        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $bulider->getWhere(['username' => $username])->getRowArray();
        // dd($user['password']);

        if ($user) {
            if ($password == $user['password']) {
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'foto' => $user['foto'],
                    'role_id' => $user['role_id']
                ];
                session()->set($data);
                // dd($session->get('email'));
                if ($user['role_id'] == 2) {
                    return redirect()->to('/komik');
                } else {
                    return redirect()->to('/user');
                }
            } else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                password salah.
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
                return redirect()->to('/auth/login');
            }
        } else {
            session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       username tidak ditemukan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
            return redirect()->to('/auth/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      anda telah keluar.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/auth/login');
    }
}
