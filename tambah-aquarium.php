<?php 

require('config.php');

// check if submit button if clicked
if(isset($_POST['tambah'])){

    // Get data from form
    $nama = $_POST['nama'];

    // Query
    $query = "INSERT INTO monitoring (nama) VALUE ('$nama')";
    $result = mysqli_query($db, $query);

    // apakah query simpan berhasil?
    if( $result ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }

}

?>