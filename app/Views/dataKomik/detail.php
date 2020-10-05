<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="shadow p-3 mb-3 bg-white rounded">
        <h3 class="mt-4">Info Komik</h3>
    </div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <?= session()->getFlashdata('pesan'); ?>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="width: 14rem;">
                    <img src="/img/<?= $komik['sampul']; ?>" class="card-img" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">
                            <h5 class="card-title"><?= $komik['judul']; ?></h5>
                        </h5>
                        <a href="/komik" class="btn btn-primary my-4">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form action="/gambar/save/<?= $komik['slug']; ?>/<?= $komik['id_komik']; ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="field" align="left">
                        <h4>Unggah Gambar Anda</h4>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambar[]')) ? 'is-invalid' : ''; ?>" id="multiple_files" name="gambar[]" multiple>
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar[]'); ?>
                            </div>
                            <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-4 mb-3">
                <h4>Masukkan Soal</h4>
                <a href="/soal/create/<?= $komik['id_komik']; ?>" class="btn btn-primary">Tambah Soal</a>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-4">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($gambar as $gam) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><img src="/img/<?= $gam['gambar']; ?>" alt="" width="75px"></td>
                                <td>
                                    <form action="/gambar/<?= $gam['slug']; ?>/<?= $gam['id_gambar']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                    </form>
                                    <a href="/gambar/edit/<?= $gam['id_gambar']; ?>" class="btn btn-warning">Edit</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Soal</th>
                            <th scope="col">A</th>
                            <th scope="col">B</th>
                            <th scope="col">C</th>
                            <th scope="col">D</th>
                            <th scope="col">E</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($soal as $so) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $so['soal']; ?></td>
                                <td><?= $so['ja']; ?></td>
                                <td><?= $so['jb']; ?></td>
                                <td><?= $so['jc']; ?></td>
                                <td><?= $so['jd']; ?></td>
                                <td><?= $so['je']; ?></td>
                                <td>
                                    <form action="/soal/delete/<?= $so['slug']; ?>/<?= $so['id_soal']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="badge badge-danger" onclick="return confirm('apakah anda yakin?');">Hapus</button>
                                    </form>
                                    <a href="/soal/edit/<?= $so['id_soal']; ?>" class="badge badge-warning">Edit</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>