<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\Data_KomikModel;

class Gambar extends BaseController
{
    public function __construct()
    {

        $this->komikModel = new Data_KomikModel();
        $this->gambarModel = new GambarModel();
    }
    public function save($slug, $id)
    {
        // $data = [
        //     'validation' => \Config\Services::validation()
        // ];

        // $slug = $this->request->uri->getSegment(3);

        if (!$this->validate([
            'gambar[]' => [
                'rules' => 'uploaded[gambar[]]|max_size[gambar[],1024]|is_image[gambar[]]|mime_in[gambar[],image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'gambar harus dipilih',
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ]))
            // {
            //     return redirect()->to('/komik/' . $slug)->withInput();
            // }
            $gambar = $this->request->getFiles();
        foreach ($gambar['gambar'] as $img) {

            $namaGambar = $img->getRandomName();
            $img->move('img', $namaGambar);

            $this->gambarModel->save([
                'slug' => $slug,
                'id_komik' => $id,
                'gambar' => $namaGambar
            ]);
        }
        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Gambar Berhasil Ditambahkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik/detail/' . $slug);
    }
    public function delete($slug, $id)
    {
        $gambar = $this->gambarModel->find($id);
        //dd($gambar);
        if ($gambar['gambar'] != 'default.jpg') {
            unlink('img/' . $gambar['gambar']);
        }
        $this->gambarModel->delete($id);
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
            'title' => 'Form Ubah Data Gambar',
            'validation' => \Config\Services::validation(),
            'gambar' => $this->gambarModel->getDataGambar($id)
        ];
        return view('dataGambar/edit', $data);
    }
    public function update($id)
    {
        $slug = $this->request->uri->getSegment(2);
        // dd($slug);
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'yang anda pilih bukan gambar',
                    'mime_in' => 'yang anda pilih bukan gambar',
                ]
            ]
        ])) {

            return redirect()->to('/komik/edit/' . $this->request->getVar('id_gambar'))->withInput();
        }

        $fileSampul = $this->request->getFile('gambar');
        $komik = $this->gambarModel->find($id);
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            if ($komik['gambar'] != 'default.jpg') {
                unlink('img/' . $this->request->getVar('sampulLama'));
            }
        }

        // $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->gambarModel->save([
            'id_gambar' => $id,
            // 'judul' => $this->request->getVar('judul'),
            // 'slug' => $slug,
            'gambar' => $namaSampul,
        ]);

        session()->setFlashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Berhasil Diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        return redirect()->to('/komik/');
    }
}
