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

</head>
<body>
    
        <div class="container" style="height: 100%;">
            <div class="row ms-5 my-4">
                <div class="col">
                <?php 
                  foreach ($result as $data) {
                  ?>
                    <div class="container">
                      <h2 class="mt-3 mb-5 fw-bold" style="color: #343A40;"><?=$data['nama']?></h2>
                      <div class="card p-5 rounded-5 border-0"  style="background-color: #F8F9FA;" >
                        <div class="row align-items-center">
    
                          <div class="col mb-3">
                            <div class="card rounded-5 " style="background-color: #64B5F6;color: #fff;">
                              <div class="card-header bg-transparent border-0">
                                <div class="d-flex justify-content-center" style="height: 131px;">
                                  <img src="assets/img/Nitrit.png" class="img-fluid pt-3 mx-auto" alt="Nitrit">
                                </div>
                              </div>
                              <div class="card-body text-center">
                                <h4 class="card-title mb-3">NITRIT</h4>
                                <h4 class="text-center"><?=$data["nitrit"];?> (mg/L)</h4>
                              </div>
                            </div>
                          </div>
      
                          <div class="col mb-3">
                            <div class="card rounded-5 "  style="background-color: #64B5F6;color: #fff;">
                              <div class="card-header bg-transparent border-0">
                                <div class="d-flex justify-content-center" style="height: 131px;">
                                  <img src="assets/img/Nitrat.png" class="img-fluid pt-3 mx-auto" alt="Nitrat">
                                </div>
                              </div>
                              <div class="card-body text-center">
                                <h4 class="card-title mb-3">NITRAT</h4>
                                <h4 class="text-center"><?=$data["nitrat"];?> (mg/L)</h4>
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
                                <h4 class="text-center"><?=$data["amonia"];?> (mg/L)</h4>
                              </div>
                            </div>
                          </div>
                        </div>
    
                        <div class="row">
                          <div class="col mt-3">
                            <h6 class="text-muted"><span class="fw-bold">Update time : </span><?=$data["waktu"];?></h6>
                          </div>
                          <div class="col-md-4 col-lg-4 mt-3">
                            <div class="row">
                              <h6 class="col-10 text-muted"><span class="fw-bold">Status : </span><?=$data["status"];?></h6> 
                              <div class="col">
                                <span class="position-absolute p-2 bg-success border border-light rounded-circle">
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php }?>
                      </div>
                    </div>
                </div>
          </div>

</body>
