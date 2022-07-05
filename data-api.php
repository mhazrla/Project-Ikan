<?php 
   
   require "config.php";
   //Aquarium 1
   $nama			= $_GET["nama"];
   $data_amonia	    = $_GET["amonia"];
   $data_nitrat     = $_GET["nitrat"];
   $data_nitrit     = $_GET["nitrit"];
   date_default_timezone_set('Asia/Jakarta');
   $tgl=date("Y-m-d G:i:s");
	
		//LOGIKA
		$nilaiAmonia = $nilaiNitrat = $nilaiNitrit = "";
		if($data_amonia==0){
			$nilaiAmonia="amonia";
		}
		 if ($data_nitrat==0){
			$nilaiNitrat="nitrat";
		}
        if ($data_nitrit==0){
			$nilaiNitrit="nitrit";
		}

        if(isset($_GET['nama'])){
            $nama = $_GET['nama'];
        } 
		
		if($data_amonia>=5 && $data_amonia<=6.5 and  $data_nitrat>=25 && $data_nitrat<=30  ){
			$statusnya="KUALITAS AIR TERJAGA!";
		}else{
			$statusnya="KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE";
		}
		

		//UPDATE DATA REALTIME PADA TABEL tb_monitoring
		$updateRealtime      = "UPDATE monitoring SET 
					
					waktu		= '$tgl', 
                    amonia      = '$data_amonia',
					nitrat		= '$data_nitrat',
					nitrit		= '$data_nitrit',
					status	 	= '$statusnya' WHERE nama = '$nama'";

		$result = mysqli_query($db, $updateRealtime);
			
		//INSERT DATA REALTIME PADA TABEL tb_save  	
		$saveData = "INSERT INTO logdata SELECT * FROM monitoring WHERE nama= '$nama'";
		// "INSERT INTO logdata 
		// (waktu, amonia, nitrat, nitrit, status)VALUES 
		// ('" . $tgl . "', 
		// '" . $data_amonia . "', '" . $data_nitrat . "', '" . $data_nitrit . "',
		// '" . $statusnya . "') WHERE nama =";

        $result = mysqli_query($db, $saveData);
				
		//MENJADIKAN JSON DATA
		//$response = query("SELECT * FROM monitoring")[0];
		// $response = query("SELECT * FROM monitoring")[0];
		// $result = json_encode($response);
    	// echo $result;
 ?>