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
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <a class="navbar-brand" href="#"><img src="/public/img/logo.png" alt="" width="110px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/user/">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/list/">LIST KOMIK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/user/tentang/">TENTANG KAMI <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <p class="mr-2"><?= $profil['nama'] ?></p>
            <div class="btn-group">
                <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    <img src="/public/img/<?= $profil['foto'] ?>" alt="" class="rounded-circle" width="40px">
                </button>
                <div class="dropdown-menu dropdown-menu-lg-right">
                    <button class="dropdown-item" type="button"><a href="/user/ubahProfil/" class="text-dark">Ubah Profil</a></button>
                    <button class="dropdown-item" type="button"><a href="/user/ubahPassword/" class="text-dark">Ubah Password</a></button>
                    <button class="dropdown-item" type="button"><a href="/auth/logout" class="text-dark">Logout</a></button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Ubah Profil</h2>
        <form action="/user/update/<?= $user['id_user'] ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="fotoLama" value="<?= $user['foto']; ?>">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= $user['nama']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-2">
                    <img src="/public/img/<?= $user['foto']; ?>" alt="" class="img-thumbnail img-preview">
                </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                        <label class="custom-file-label" for="foto">
                            <p id="p"> <?= $user['foto']; ?></p>
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

    <!-- footer -->

    <div class="footer mt-5">
        <p class="text-center">&copy;2020 Develop By Fahmi Aga Aditya</p>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            // const fotoLabel = document.querySelector('.costum-file-label');
            const fotoLabel = document.getElementsByClassName('custom-file-label');
            const tulisLabel = document.getElementById('p').innerHTML;
            const imgPreview = document.querySelector('.img-preview');
            //console.log(tulisLabel);
            fotoLabel.textContent = foto.files[0].name;
            document.getElementById('p').innerHTML = fotoLabel.textContent;
            const filefoto = new FileReader();
            filefoto.readAsDataURL(foto.files[0]);

            filefoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>