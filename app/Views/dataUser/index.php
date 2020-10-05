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
                <li class="nav-item active">
                    <a class="nav-link" href="/user/">BERANDA <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/list/">LIST KOMIK</a>
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
                    <button class="dropdown-item" type="button"><a href="/user/ubahProfil/" class="text-dark">Ubah Profil</a></button>
                    <button class="dropdown-item" type="button"><a href="/user/ubahPassword/" class="text-dark">Ubah Password</a></button>
                    <button class="dropdown-item" type="button"><a href="/auth/logout" class="text-dark">Logout</a></button>
                </div>
            </div>
        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide mb-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/slider/1.jpg" class="d-block w-100" alt="..." height="500px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slider/2.jpg" class="d-block w-100" alt="..." height="500px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slider/3.jpg" class="d-block w-100" alt="..." height="500px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container">
        <h2>KOMIK TERBARU</h2>
        <div class="row">
            <?php foreach ($komik as $kom) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="/img/<?= $kom->sampul; ?>" class="card-img-top" alt="..." width="50px" height="350px">
                        <div class="card-body">
                            <h5 class="card-title"><?= $kom->judul; ?></h5>
                            <a href="/user/detail/<?= $kom->slug; ?>" class="btn btn-primary">Lihat Komik</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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