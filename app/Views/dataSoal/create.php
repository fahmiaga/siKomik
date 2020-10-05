<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="shadow p-3 mb-5 bg-white rounded">
        <h3 class="mt-4">Form Tambah Data Soal</h3>
    </div>
    <form action="/soal/save/<?= $soal['slug']; ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="id_komik" value="<?= $soal['id_komik']; ?>">
        <input type="hidden" name="slug" value="<?= $soal['slug']; ?>">

        <div class="form-group row">
            <label for="soal" class="col-sm-2 col-form-label">Soal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('soal')) ? 'is-invalid' : ''; ?>" id="soal" name="soal" autofocus value="<?= old('soal'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('soal'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="ja" class="col-sm-2 col-form-label">Jawaban A</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('ja')) ? 'is-invalid' : ''; ?>" id="ja" name="ja" autofocus value="<?= old('ja'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('ja'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jb" class="col-sm-2 col-form-label">Jawaban B</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('jb')) ? 'is-invalid' : ''; ?>" id="jb" name="jb" autofocus value="<?= old('jb'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jb'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jc" class="col-sm-2 col-form-label">Jawaban C</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('jc')) ? 'is-invalid' : ''; ?>" id="jc" name="jc" autofocus value="<?= old('jc'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jc'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jd" class="col-sm-2 col-form-label">Jawaban D</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('jd')) ? 'is-invalid' : ''; ?>" id="jd" name="jd" autofocus value="<?= old('jd'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jd'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="je" class="col-sm-2 col-form-label">Jawaban E</label>
            <div class="col-sm-5">
                <input type="text" class="form-control <?= ($validation->hasError('je')) ? 'is-invalid' : ''; ?>" id="je" name="je" autofocus value="<?= old('je'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('je'); ?>
                </div>
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">

                <legend class="col-form-label col-sm-2 pt-0">Jawaban Benar</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jBenar" id="inlineRadio1" value="ja">
                    <label class="form-check-label" for="inlineRadio1">A</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jBenar" id="inlineRadio2" value="jb">
                    <label class="form-check-label" for="inlineRadio2">B</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jBenar" id="inlineRadio2" value="jc">
                    <label class="form-check-label" for="inlineRadio2">C</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jBenar" id="inlineRadio2" value="jd">
                    <label class="form-check-label" for="inlineRadio2">D</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jBenar" id="inlineRadio2" value="je">
                    <label class="form-check-label" for="inlineRadio2">E</label>
                </div>
            </div>
        </fieldset>

        <div class="form-group row">
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </div>
        </div>

    </form>

</div>
<?= $this->endSection(); ?>