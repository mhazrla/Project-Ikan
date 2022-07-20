<?php

require('config.php');

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];
}

$queryDashboard =  "SELECT DISTINCT nama FROM monitoring ORDER BY nama";
$resultDashboard = mysqli_query($db, $queryDashboard);

// Fetch all data data from logdata table
$queryData =  "SELECT * FROM logdata WHERE nama = '$nama' ORDER BY waktu DESC";
$resultData = mysqli_query($db, $queryData);
$data = mysqli_fetch_array($resultData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</head>

<body style="background-color: #F2F4FF;" class="d-flex flex-column min-vh-100">
    <div class="screen-cover d-none d-xl-none"></div>

    <div class="sidebar-nav">
        <nav class="navbar navbar-dark bg-primary fixed-top ">
            <div class="container">

                <div class="offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-body bg-primary bg-opacity-75">
                        <ul class="navbar-nav ">
                            <li class="nav-item mt-5">
                                <a href="index.php" class="sidebar-item nav-link rounded-pill d-flex justify-content-center" onclick="toggleActive(this) ">
                                    <span class="material-symbols-outlined me-2">
                                        dashboard
                                    </span>
                                    <span class="fw-semibold item-text fs-6">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="sidebar-item nav-link rounded-pill d-flex justify-content-center" onclick="toggleActive(this)" data-bs-toggle="collapse" href="#listAquarium" role="button" aria-expanded="false" aria-controls="listAquarium">
                                    <span class="material-symbols-outlined me-2">
                                        database
                                    </span>
                                    <span class="item-text fs-6">Log Data</span>
                                    <span class="material-symbols-outlined">
                                        expand_more
                                    </span>
                                </a>
                            </li>
                            <div class="collapse " id="listAquarium">
                                <div class="card card-body border-0 bg-transparent ">
                                    <ul class="text-secondary text-white">
                                        <?php
                                        while ($listData = mysqli_fetch_array($resultDashboard)) {
                                        ?>
                                            <li class="">
                                                <a href="logData.php?nama=<?= $listData['nama'] ?>" class="list-aquarium text-decoration-none fs-6 rounded-pill"><?= $listData['nama'] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="navbar container-fluid d-flex align-items-center">
                    <a class="navbar-brand fw-bold title " href="#">
                        <img src="./assets/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top fish">
                        Projek<span class=" fs-4 text-white">FISH</span>
                    </a>
                    <a class="navbar-brand mx-auto d-inline-block align-item-center page fw-bold fs-3" href="#">LOG DATA</a>

                    <!-- Mobile Menu Toggle Button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <section id="data">
        <div class="container" style="height: 100%;">
            <div class="row my-5 pt-5" style="height: 100%;">
                <div class="col mt-5 pt-5 pt-md-0 ">
                    <a class="btn btn-danger mb-4 me-3 px-4 rounded-pill" href="delete.php?nama=<?= $data['nama'] ?>" onclick="return confirm('Yakin ingin menghapus data?')">
                        <span class="material-symbols-outlined align-text-top">
                            delete
                        </span>
                        <span>Clear</span>
                    </a>

                    <a class="btn btn-primary mb-4 me-4 px-4 rounded-pill " href="export.php?nama=<?= $data['nama'] ?>">
                        <span class="material-symbols-outlined align-text-top">
                            file_download
                        </span>
                        <span>Download</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section id="table">
        <div class="container table-responsive mb-5" style="height: 100%;">
            <!-- Table start -->
            <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">PH</th>
                        <th scope="col">Suhu</th>
                        <th scope="col">Amonia</th>
                        <th scope="col">TDS</th>
                        <th scope="col">TSS</th>
                        <th scope="col">Salinitas</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 0;
                    foreach ($resultData as $data) {
                        $no++
                    ?>
                        <tr>
                            <th scope="col"><?= $no ?></th>
                            <th scope="col"><?= $data['waktu'] ?></th>
                            <th scope="col"><?= $data['ph'] ?></th>
                            <th scope="col"><?= $data['suhu'] ?></th>
                            <th scope="col"><?= $data['amonia'] ?></th>
                            <th scope="col"><?= $data['tds'] ?></th>
                            <th scope="col"><?= $data['tss'] ?></th>
                            <th scope="col"><?= $data['salinitas'] ?></th>
                            <th scope="col"><?= $data['status'] ?></th>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            <!-- Table end -->

            <!-- Pagination start -->
            <!-- <nav aria-label="Page navigation">
                <div class="pagination flex-wrap justify-content-center align-items-center container">
                    <ul class="row list-unstyled p-3 rounded-4 pages" style="background-color: #FFFFFF; ">
                        <li class="col page-item disabled">
                            <a class="page-link border-0">
                                <span class="material-symbols-outlined">
                                    arrow_back_ios
                                </span>
                            </a>
                        </li>
                        <li class="col page-item active">
                            <a class="page-link border-0 rounded-2" href="#">1</a>
                        </li>
                        <li class="col page-item">
                        <a class="page-link border-0 rounded-2" href="#">2</a>
                        </li>
                        <li class="col page-item">
                            <a class="page-link border-0 rounded-2" href="#">3</a>
                        </li>
                        <li class="col page-item">
                            <a class="page-link border-0 rounded-2" href="#">...</a>
                        </li>
                        <li class="col page-item">
                            <a class="page-link border-0 rounded-2" href="#">22</a>
                        </li>
                        <li class="col page-item">
                            <a class="page-link border-0">
                                <span class="material-symbols-outlined">
                                    arrow_forward_ios
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav> -->
            <!-- Pagination ends -->
        </div>
    </section>

    <footer class="bg-light text-center text-lg-start mt-auto ">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #2083F4; color: #fff;">
            © 2022 Copyright || Created by Project Mahasiswa || SV IPB
        </div>
        <!-- Copyright -->
    </footer>

</body>
<script>
    const navbar = document.querySelector('.col-navbar')
    const cover = document.querySelector('.screen-cover')

    const sidebar_items = document.querySelectorAll('.sidebar-item')

    function toggleNavbar() {
        navbar.classList.toggle('d-none')
        cover.classList.toggle('d-none')
    }

    function toggleActive(e) {
        sidebar_items.forEach(function(v, k) {
            v.classList.remove('active')
        })
        e.closest('.sidebar-item').classList.add('active')

    }

    $(document).ready(function() {
        $('table').DataTable();
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>