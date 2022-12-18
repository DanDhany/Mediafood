<?php
include("db_config.php");
$response = array();
	
	$idMeja = '1';
	$tglTrans = '2019/01/08';
	$gTotal = '10000';
	$tBayar = '15000';
	$kembali = '5000';
	$sts_trans = 'baru';
	
	$idTrans = "T25";
    $idMenu = 4;
    $NamaMenu = "Ayam Panggang";
    $hrgMenu = "17000";
    $jmlPesan = 1;
    $stsPesan = 'lama';

	$result = mysqli_query($conn, "SELECT * FROM master_jual where id_trans='$idTrans'");
	
if(mysqli_num_rows($result)>0){
	$response["message"] = "Masuk Situ";
	$baru = mysqli_query($conn, "INSERT INTO master_jual VALUES('$idTrans', $idMeja, '$tglTrans', $gTotal, $tBayar, $kembali, '$stsPesan')");
	
	$tambah = mysqli_query($conn, "INSERT INTO detail_jual VALUES('$idTrans', $idMenu, '$NamaMenu', '$hrgMenu', $jmlPesan, '$stsPesan')") ;
	
	if($tambah>0 && $baru>0){
			$response["success"] = 1;
		}
		else{
			$response["failed"] = 0;
			$response["message"] = "Fail 2";
		}
}else {
	$response["message"] = "Masuk Sini";
	$tambah = mysqli_query($conn, "INSERT INTO detail_jual('id_trans', id_menu, nama_menu, hrg_menu, jml_pesan, sts_pesan) VALUES('$idTrans', $idMenu, '$NamaMenu', '$hrgMenu', $jmlPesan, '$stsPesan')");
		if($tambah>0){
			$response["success"] = 1;
		}
		else{
			$response["failed"] = 0;
			$response["message"] = "Fail 1";
		}
}
    

    echo json_encode($response);

    $conn->close();
?>