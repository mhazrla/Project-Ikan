<?php 
   
   require "config.php";
   //Aquarium 1
   $nama			= $_GET["nama"];
   $data_amonia	    = $_GET["amonia"];
   $data_suhu     	= $_GET["suhu"];
   $data_ph     	= $_GET["ph"];
   $data_tss	    = $_GET["tss"];
   $data_tds     	= $_GET["tds"];
   $data_salinitas  = $_GET["salinitas"];
   date_default_timezone_set('Asia/Jakarta');
   $tgl=date("Y-m-d G:i:s");
	
		//LOGIKA
		$nilaiAmonia = $nilaiSuhu = $nilaiPH = $nilaiTSS = $nilaiTDS = $nilaiSalinitas ="";
		if ($data_amonia==0){
			$nilaiAmonia="amonia";
		}
		 if ($data_suhu==0){
			$nilaiSuhu="suhu";
		}
        if ($data_ph==0){
			$nilaiPH="ph";
		}
		if ($data_tss==0){
			$nilaiAmonia="tss";
		}
		 if ($data_tds==0){
			$nilaiSuhu="tds";
		}
        if ($data_salinitas==0){
			$nilaiPH="salinitas";
		}

        if(isset($_GET['nama'])){
            $nama = $_GET['nama'];
        } 
		
		if($data_amonia>=26 && $data_amonia<=28 and $data_suhu>=36 && $data_suhu<=38 and
			$data_ph>=46 && $data_ph<=48 and $data_tss>=56 && $data_tss<=58 and
			$data_tds>=66 && $data_tds<=68 and $data_salinitas>=76 && $data_salinitas<=78 ){
			$statusnya="KUALITAS AIR TERJAGA!";
		}else{
			$statusnya="KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE";
		}
		

		//UPDATE DATA REALTIME PADA TABEL tb_monitoring
		$updateRealtime      = "UPDATE monitoring SET 
					
					waktu		= '$tgl', 
                    amonia      = '$data_amonia',
					suhu		= '$data_suhu',
					ph			= '$data_ph',
					tss		    = '$data_tss',
					tds			= '$data_tds',
					salinitas	= '$data_salinitas',
					status	 	= '$statusnya' WHERE nama = '$nama'";

		$result = mysqli_query($db, $updateRealtime);
			
		//INSERT DATA REALTIME PADA TABEL tb_save  	
		$saveData = "INSERT INTO logdata SELECT * FROM monitoring WHERE nama= '$nama'";
		// "INSERT INTO logdata 
		// (waktu, amonia, nitrat, nitrit, status)VALUES 
		// ('" . $tgl . "', 
		// '" . $data_amonia . "', '" . $data_nitrat . "', '" . $data_ph . "',
		// '" . $statusnya . "') WHERE nama =";

        $result = mysqli_query($db, $saveData);
				
		//MENJADIKAN JSON DATA
		//$response = query("SELECT * FROM monitoring")[0];
		// $response = query("SELECT * FROM monitoring")[0];
		// $result = json_encode($response);
    	// echo $result;
 ?>