<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\Data_KomikModel;
use App\Models\SoalModel;

class Soal extends BaseController
{
    public function __construct()
    {

        $this->komikModel = new Data_KomikModel();
        $this->gambarModel = new GambarModel();
        $this->soalModel = new SoalModel();
    }
    public function create($id)
    {
        // $a = $this->komikModel->find($id);
        // dd($a['id_komik']);
        $data = [
            'title' => 'Form Tambah Data Soal',
            'validation' => \Config\Services::validation(),
            'soal' => $this->komikModel->find($id),
            'request' => \Config\Services::request(),
        ];
        return view('dataSoal/create', $data);
    }
    public function save()
    {
        $slug = $this->request->getVar('slug');
        if (!$this->validate([
            'soal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'ja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'jb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'jc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'jd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'je' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/soal/create')->withInput();
        }
        $this->soalModel->save([
            'soal' => $this->request->getVar('soal'),
            'id_komik' => $this->request->getVar('id_komik'),
            'slug' => $slug,
            'ja' => $this->request->getVar('ja'),
            'jb' => $this->request->getVar('jb'),
            'jc' => $this->request->getVar('jc'),
            'jd' => $this->request->getVar('jd'),
            'je' => $this->request->getVar('je'),
            'jBenar' => $this->request->getVar('jBenar'),

        ]);

        // $this->soalModel->save(['jBenar' => $this->request->getVar('jBenar'),]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Ditambahkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik/detail/' . $slug);
    }
    public function delete($slug, $id)
    {
        // $slug = $this->request->uri->getSegment(2);
        // dd($slug);
        $this->soalModel->delete($id);
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik/detail/' . $slug);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Form Ubah Data Soal',
            'validation' => \Config\Services::validation(),
            'soal' => $this->soalModel->getSoal($id)
        ];
        return view('dataSoal/edit', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'soal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'ja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'jb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'jc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'jd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
            'je' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jawaban komik harus diisi.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/soal/edit/' . $id);
        }
        $this->soalModel->save([
            'id_soal' => $id,
            'soal' => $this->request->getVar('soal'),
            'id_komik' => $this->request->getVar('id_komik'),
            'slug' => $this->request->getVar('slug'),
            'ja' => $this->request->getVar('ja'),
            'jb' => $this->request->getVar('jb'),
            'jc' => $this->request->getVar('jc'),
            'jd' => $this->request->getVar('jd'),
            'je' => $this->request->getVar('je'),
            'jBenar' => $this->request->getVar('jBenar'),

        ]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik/detail/' . $this->request->getVar('slug'))->withInput();
    }
}
