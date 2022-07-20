<?php
require('config.php');

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

</head>

<body>

  <div class="container" style="height: 100%;">
    <div class="row ms-5 my-4">
      <div class="col">
        <?php
        foreach ($result as $data) {
        ?>
          <div class="container">
            <h2 class="mt-3 mb-5 fw-bold" style="color: #343A40;"><?= $data['nama'] ?></h2>
            <div class="card p-5 rounded-5 border-0" style="background-color: #F8F9FA;">
              <div class="row mb-3">
                <div class="col">
                  <h6 class="text-muted"><span class="fw-bold">Update time : </span><?= $data["waktu"]; ?></h6>
                </div>

                <div class="col-md-4 col-lg-4">
                  <div class="row">
                    <h6 class="col-10 text-muted"><span class="fw-bold">Status : </span><?= $data["status"]; ?></h6>
                    <div class="col">
                      <?php if ($data["status"] == "KUALITAS AIR TERJAGA!") : ?>
                        <span class="position-absolute p-2 bg-success border border-light rounded-circle"></span>
                      <?php elseif ($data["status"] == "KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE") : ?>
                        <span class="position-absolute p-2 bg-danger border border-light rounded-circle"></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row align-items-center row-cols-3">

                <div class="col mb-3">
                  <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                    <div class="card-header bg-transparent border-0">
                      <div class="d-flex justify-content-center" style="height: 131px;">
                        <img src="assets/img/PH.png" class="img-fluid pt-3 mx-auto" alt="PH">
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title mb-3">PH</h4>
                      <h4 class="text-center"><?= $data["ph"]; ?> (mg/L)</h4>
                    </div>
                  </div>
                </div>

                <div class="col mb-3">
                  <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                    <div class="card-header bg-transparent border-0">
                      <div class="d-flex justify-content-center" style="height: 131px;">
                        <img src="assets/img/Temperature.png" class="img-fluid pt-3 mx-auto" alt="Suhu">
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title mb-3">SUHU</h4>
                      <h4 class="text-center"><?= $data["suhu"]; ?> (mg/L)</h4>
                    </div>
                  </div>
                </div>

                <div class="col mb-3">
                  <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                    <div class="card-header bg-transparent border-0">
                      <div class="d-flex justify-content-center" style="height: 131px;">
                        <img src="assets/img/Amonia.svg" class="img-fluid pt-3 mx-auto" alt="Amonia">
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title mb-3">AMONIA</h4>
                      <h4 class="text-center"><?= $data["amonia"]; ?> (mg/L)</h4>
                    </div>
                  </div>
                </div>

                <div class="col mb-3">
                  <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                    <div class="card-header bg-transparent border-0">
                      <div class="d-flex justify-content-center" style="height: 131px;">
                        <img src="assets/img/tds.png" class="img-fluid pt-3 mx-auto" alt="TDS">
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title mb-3">TDS</h4>
                      <h4 class="text-center"><?= $data["tds"]; ?> (mg/L)</h4>
                    </div>
                  </div>
                </div>

                <div class="col mb-3">
                  <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                    <div class="card-header bg-transparent border-0">
                      <div class="d-flex justify-content-center" style="height: 131px;">
                        <img src="assets/img/TSS.png" class="img-fluid pt-3 mx-auto" alt="TSS">
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title mb-3">TSS</h4>
                      <h4 class="text-center"><?= $data["tss"]; ?> (mg/L)</h4>
                    </div>
                  </div>
                </div>

                <div class="col mb-3">
                  <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                    <div class="card-header bg-transparent border-0">
                      <div class="d-flex justify-content-center" style="height: 131px;">
                        <img src="assets/img/salinitas.png" class="img-fluid pt-3 mx-auto" alt="Salinitas">
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <h4 class="card-title mb-3">SALINITAS</h4>
                      <h4 class="text-center"><?= $data["salinitas"]; ?> (mg/L)</h4>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          <?php } ?>
          </div>
      </div>
    </div>
  </div>

</body>