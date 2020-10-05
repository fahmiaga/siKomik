<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="/css/simple-sidebar.css" rel="stylesheet">
    <!-- img css -->
    <link href="/css/img.css" rel="stylesheet">

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="border-right text-white" style="background-color:#87e0fa;" id="sidebar-wrapper">
            <div class="sidebar-heading">My Komik</div>
            <div class="list-group list-group-flush ">
                <a href="/" class="list-group-item list-group-item-action text-white" style="background-color:#87e0fa;">Dashboard</a>
                <a href="/komik" class="list-group-item list-group-item-action text-white" style="background-color:#87e0fa;">Data Komik</a>
                <a href="#" class="list-group-item list-group-item-action text-white" style="background-color:#87e0fa;">Overview</a>
                <a href="#" class="list-group-item list-group-item-action text-white" style="background-color:#87e0fa;">Events</a>
                <a href="#" class="list-group-item list-group-item-action text-white" style="background-color:#87e0fa;">Profile</a>
                <a href="/auth/logout" class="list-group-item list-group-item-action text-white" style="background-color:#87e0fa;">Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #e3f2fd;">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- content -->
            <?= $this->renderSection('content'); ?>
            <!-- endContent -->
            <!-- /#page-content-wrapper -->

            <!-- /#wrapper -->
        </div>
        <!-- Bootstrap core JavaScript -->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script>
            function previewImg() {
                const sampul = document.querySelector('#sampul');
                // const sampulLabel = document.querySelector('.costum-file-label');
                const sampulLabel = document.getElementsByClassName('custom-file-label');
                const tulisLabel = document.getElementById('p').innerHTML;
                const imgPreview = document.querySelector('.img-preview');
                //console.log(tulisLabel);
                sampulLabel.textContent = sampul.files[0].name;
                document.getElementById('p').innerHTML = sampulLabel.textContent;
                const fileSampul = new FileReader();
                fileSampul.readAsDataURL(sampul.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }
        </script>
        <script src="/js/tambah.js"></script>
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

</body>

</html>