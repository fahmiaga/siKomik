<?php

namespace App\Controllers;

use App\Models\Data_KomikModel;
use App\Models\GambarModel;
use App\Models\SoalModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new Data_KomikModel();
        $this->gambarModel = new GambarModel();
        $this->soalModel = new SoalModel();
        // dd(session()->get('email'));

    }
    public function index()
    {
        if (!session()->has('username')) {
            return redirect()->to('/auth/login');
        }
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Data Komik',
            'komik' => $this->komikModel->getKomik()
        ];
        $komikModel = new \App\Models\Data_KomikModel();
        $komikModel = new Data_KomikModel();

        return view('dataKomik/komik', $data);
    }
    public function detail($slug)
    {
        $komik = $this->komikModel->getKomik($slug);
        $gambar = $this->gambarModel->getGambar($slug);
        $soal = $this->soalModel->getDataSoal($slug);
        // dd($soal);
        $data = [
            'title' => 'Info Komik',
            'komik' => $komik,
            'gambar' => $gambar,
            'soal' => $soal,
            'validation' => \Config\Services::validation()
        ];

        // if (empty($data['komik'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik ' . $slug . 'Tidak Ditemukan');
        // }

         return view('dataKomik/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];
        return view('dataKomik/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[data_komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.jpg';
        } else {
            // $namaSampul = $fileSampul->getName();
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik');
    }
    public function hapus($id)
    {
        $komik = $this->komikModel->find($id);
        if ($komik['sampul'] != 'default.jpg') {
            unlink('img/' . $komik['sampul']);
        }
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik');
    }
    public function ubah($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('dataKomik/edit', $data);
    }
    public function update($id)
    {
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[data_komik.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ])) {

            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        $komik = $this->komikModel->find($id);
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            if ($komik['sampul'] != 'default.jpg') {
                unlink('img/' . $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id_komik' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sampul' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik');
    }
    
    //--------------------------------------------------------------------

}
