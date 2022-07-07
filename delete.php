<?php
require 'config.php';

$nama = $_GET['nama'];
$query = "DELETE FROM logdata WHERE nama='$nama'";
$result = mysqli_query($db, $query);

if($result){
    header("Location: logData.php?nama=$nama");
} else {
    die("Gagal menghapus data");
}

?>