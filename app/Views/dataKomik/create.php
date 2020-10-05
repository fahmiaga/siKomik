<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="mt-4">Form Tambah Data Komik</h3>
    </div>
    <form action="/komik/save" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('judul'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
            <div class="col-sm-2">
                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul" name="sampul" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
                    <label class="custom-file-label" for="sampul">
                        <p id="p"> Pilih Gambar</p>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>
    </form>

</div>
<?= $this->endSection(); ?>