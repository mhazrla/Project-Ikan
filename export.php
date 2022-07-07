<?php 
require 'config.php';

if(isset($_GET['nama'])){
    $nama = $_GET['nama'];
} 

$result = $db -> query("SELECT * FROM logdata WHERE nama = '$nama' ORDER BY waktu DESC");

if($result->num_rows > 0){ 
    $delimiter = ',';
    $filename = "Log data ". $nama . " " . date('Y-m-d') . ".csv";

    // Pointer file
    $f = fopen('php://memory', 'w'); 

    // Set column headers 
    $fields = array('nama', 'waktu', 'nitrit', 'nitrat', 'amonia', 'status'); 
    fputcsv($f, $fields, $delimiter); 

    //output each row of the data, format line as csv and write to file pointer
    while($row = $result->fetch_assoc()){
        $lineData = array($row['nama'], $row['waktu'], $row['nitrit'], $row['nitrat'], $row['amonia'], $row['status']);
        fputcsv($f, $lineData, $delimiter);
    }

    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
?>