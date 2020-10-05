<?php

namespace App\Controllers;

use App\Models\Data_KomikModel;
use App\Models\GambarModel;
use App\Models\SoalModel;
use App\Models\UserModel;

class User extends BaseController
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
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }
        $data = [
            'title' => 'Beranda',
            // 'komik' => $this->komikModel->getKomikLimit()->getResult()
            'komik' => $this->komikModel->getKomikLimit()->getResult()
        ];
        return view('dataUser/index', $data);
    }
    public function detail($slug)
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }

        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug),
        ];
        return view('dataUser/detail', $data);
    }
    public function read($slug)
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }
        $title = $this->komikModel->getKomik($slug);
        $data = [
            'title' => $title['judul'],
            'gambar' => $this->gambarModel->getGambar($slug),
            'soal' => $slug,
        ];
        return view('dataUser/read', $data);
    }
    public function quiz($slug)
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }
        $soal = $this->soalModel->getDataSoal($slug);
        $nilai = 0;
        $hasil = 0;
        $benar = 0;
        $salah = 0;
        foreach ($soal as $so) {
            $jawaban = $this->request->getVar('jawaban' . $so['id_soal']);
            $jmlSoal = $this->request->getVar('jmlSoal');
            if ($so['jBenar'] == $jawaban) {
                $nilai += 100;
                $hasil = $nilai / $jmlSoal;
                $benar++;
            } else {
                $salah++;
            }
        }
        $title = $this->komikModel->getKomik($slug);
        $data = [
            'title' => 'Quiz ' . $title['judul'],
            'soal' => $this->soalModel->getDataSoal($slug),
            'nilai' => round($hasil),
            'benar' => $benar,
            'salah' => $salah,
        ];
        return view('dataUser/quiz', $data);
    }
    public function ubahProfil()
    {
        $profil = $this->userModel->getUser(session()->get('id_user'));
        $id = session()->get('id_user');
        $data = [
            'title' => 'Form Ubah Profil',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUser($id),
            'profil' => $profil
        ];
        return view('dataUser/ubahProfil', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ])) {

            return redirect()->to('/user/ubahProfil/' . $this->request->getVar('id_user'))->withInput();
        }
        // $id = session()->get('id_user');
        $fileFoto = $this->request->getFile('foto');
        $user = $this->userModel->find($id);
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
            if ($user['foto'] != 'defaultUser.jpg') {
                unlink('img/' . $this->request->getVar('fotoLama'));
            }
        }

        $this->userModel->save([
            'id_user' => $id,
            'username' => $user['username'],
            'password' => $user['password'],
            'nama' => $this->request->getVar('nama'),
            'foto' => $namaFoto,
            'role_id' => $user['role_id']
        ]);
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/user/ubahprofil');
    }
    public function list()
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $komik = $this->komikModel->search($keyword);
        } else {
            $komik = $this->komikModel;
        }
        $data = [
            'title' => 'List Komik',
            'komik' => $komik->paginate(6, 'komik'),
            'pager' => $this->komikModel->pager
        ];
        return view('dataUser/list', $data);
    }
    public function tentang()
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }
        $data = [
            'title' => 'Tentang Kami'
        ];
        return view('dataUser/tentang', $data);
    }
}
