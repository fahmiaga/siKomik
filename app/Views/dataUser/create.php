<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title><?= $title; ?></title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-transparent mb-0">
                        <h5 class="text-center">Silahkan <span class="font-weight-bold text-primary">LOGIN</span></h5>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <?= session()->getFlashdata('pesan'); ?>
                        <?php endif; ?>
                        <form action="/auth/save" method="POST">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?= old('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="nama" name="nama" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="nama" value="<?= old('nama'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwordConfirm" class="form-control <?= ($validation->hasError('passwordConfirm')) ? 'is-invalid' : ''; ?>" placeholder="Konfirmasi Password">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('passwordConfirm'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="" value="Login" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                    <a href="/auth/login" class="text-center"> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>