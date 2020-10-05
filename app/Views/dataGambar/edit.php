<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="mt-4">Form Ubah Data Komik</h3>
    </div>
    <form action="/gambar/update/<?= $gambar['id_gambar']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $gambar['slug']; ?>">
        <input type="hidden" name="sampulLama" value="<?= $gambar['gambar']; ?>">

        <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">gambar</label>
            <div class="col-sm-2">
                <img src="/img/<?= $gambar['gambar']; ?>" alt="" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                    <div class="invalid-feedback">
                        <?= $validation->getError('gambar'); ?>
                    </div>
                    <label class="custom-file-label" for="gambar">
                        <p id="p"> <?= $gambar['gambar']; ?></p>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </div>
    </form>

</div>
<?= $this->endSection(); ?>