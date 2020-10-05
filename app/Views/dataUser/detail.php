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
        <a class="navbar-brand" href="#"><img src="/img/logo.png" alt="" width="110px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/user/">BERANDA </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/user/list/">LIST KOMIK <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/tentang/">TENTANG KAMI</a>
                </li>
            </ul>
            <p class="mr-2"><?= session()->get('nama'); ?></p>
            <div class="btn-group">
                <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                    <img src="/img/<?= session()->get('foto'); ?>" alt="" class="rounded-circle" width="40px">
                </button>
                <div class="dropdown-menu dropdown-menu-lg-right">
                    <button class="dropdown-item" type="button"><a href="/user/ubahProfil" class="text-dark">Ubah Profil</a></button>
                    <button class="dropdown-item" type="button"><a href="/user/ubahPassword" class="text-dark">Ubah Password</a></button>
                    <button class="dropdown-item" type="button"><a href="/auth/logout" class="text-dark">Logout</a></button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>DETAIL KOMIK</h2>
        <div class="row">
            <div class="col-6">
                <div class="card" style="width: 20rem;">
                    <img src="/img/<?= $komik['sampul']; ?>" class="card-img-top" alt="..." height="500px" width="250">
                    <div class="card-body">
                        <p class="card-text font-weight-bold"><?= $komik['judul']; ?></p>
                        <a href="/user/list/" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <a href="/user/read/<?= $komik['slug']; ?>" class="btn btn-success">Baca Komik</a>
                <a href="/user/quiz/<?= $komik['slug']; ?>" class="btn btn-primary">Ikuti Quiz</a>
            </div>
        </div>
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
</body>

</html>