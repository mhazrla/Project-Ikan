<?php
require ('config.php');

$query = "SELECT * FROM monitoring ORDER BY nama ASC";
$result = mysqli_query($db, $query);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.map"</script>
    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"</script>
    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"</script>
    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"</script>
    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.js"</script>
    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.map"</script>
    <script>"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"</script>
    <script>"https://unpkg.com/jquery@3.3.1/dist/jquery.js"</script>

</head>
<body class="d-flex flex-column min-vh-100">
    <div class="screen-cover d-none d-xl-none"></div>

    <div class="sidebar-nav">
        <nav class="navbar navbar-dark bg-primary fixed-top ">
            <div class="container">
    
                <div class="offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                  <div class="offcanvas-body bg-primary bg-opacity-75">
                        <ul class="navbar-nav ">
                            <li class="nav-item mt-5">
                                <a href="#" class="sidebar-item nav-link rounded-pill d-flex justify-content-center" onclick="toggleActive(this) " >
                                    <span class="material-symbols-outlined me-2">
                                    dashboard
                                    </span>
                                    <span class="fw-semibold item-text fs-6">Dashboard</span>
                                </a>
                            </li>
                            <li  class="nav-item mt-2">
                                <a class="sidebar-item nav-link rounded-pill d-flex justify-content-center" onclick="toggleActive(this)" data-bs-toggle="collapse" 
                                href="#listAquarium" role="button" aria-expanded="false" aria-controls="listAquarium">
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
                                      foreach ($result as $data) {
                                    ?>

                                    <li class="">
                                      <a href="logData.php?nama=<?= $data['nama'] ?>" class="list-aquarium text-decoration-none fs-6 rounded-pill"><?= $data['nama'] ?></a>
                                    </li>
                                    
                                    <?php }?>
                                    
                                  </ul>    
                                </div>
                            </div>
                        </ul>
                  </div>
                </div>
    
                <div class="navbar container-fluid d-flex align-items-center">
                    <a class="navbar-brand fw-bold title " href="#">
                        <img src="./assets/img/logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                        Projek<span class="fish fs-4 text-white">FISH</span>
                    </a>
                    <a class="navbar-brand mx-auto d-inline-block align-item-center page fw-bold fs-3" href="#">SENSOR MONITORING</a>

                    <!-- Mobile Menu Toggle Button -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    </div>
    
    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Aquarium baru berhasil ditambahkan";
            } else {
                echo "Aquarium gagal ditambahkan";
            }
        ?>
    </p>
    <?php endif; ?>
    
    <section id="data">
        <div class="container" style="height: 100%;">
            <div class="row my-5 pt-5" style="height: 100%;">
                <div class="col mx-auto mt-5 pt-5 pt-md-0">
                    <div class="input-group ">
                        <span class="input-group-append">
                            <button class="btn btn-outline-muted border-0  ms-ns rounded-pill" type="button" 
                                data-bs-toggle="collapse" href="#tambahData" role="button" aria-expanded="false" aria-controls="tambahData"
                                style="background-color: #E9ECEF; color: #333333;" data-bs-target="#tambahData">
                                <span class="material-symbols-outlined align-text-top">
                                    add_circle
                                </span>
                                <span>Tambah Aquarium</span>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="col ms-auto mt-4 pt-5 pt-md-0">
                    <form action="tambah-aquarium.php" method="POST">
                        <div class="collapse mt-3" id="tambahData" >
                            <div class="card card-body border-0 rounded-pill float-end d-flex justify-content-end pe-5 me-5 p-1 " style="background-color: #E9ECEF;">
                                <div class="row d-flex">
                                    <div class="col-md-10">
                                        <input class=" form-control border-end-0 border rounded-pill rounded-pill" type="text" placeholder="Masukkan nama..."  name="nama"> 
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary rounded-4 border-0" style="background-color: #2196F3;" name="tambah">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="load-data"></div>

        </div>
      </section>

      <section id="data">
      </section>

      <footer class="bg-light text-center text-lg-start mt-auto">
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
  $(document).ready(function(){
    setInterval(function() {
      $('.load-data').load('load-data.php');
    }, 50);
	

  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</html>