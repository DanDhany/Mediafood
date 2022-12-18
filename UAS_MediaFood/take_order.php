<?php
error_reporting(0);
include("db_config.php");
$response = array();
	
	$idTrans = $_POST['id_trans'];
    $idMenu = $_POST['id_menu'];
    $NamaMenu = $_POST['nama_menu'];
    $hrgMenu = $_POST['hrg_menu'];
    $jmlPesan = $_POST['jml_pesan'];
    $stsPesan = 'keranjang';
	$stsPesan1 = 'selesai';
    $result1 = mysqli_query($conn, "SELECT * FROM master_jual where id_trans='$idTrans' and sts_trans='$stsPesan1'");
	
	if(mysqli_num_rows($result1) > 0){
		$response["failed"] = 0;
    }else{
		$result2 = mysqli_query($conn, "SELECT * FROM detail_jual where id_trans='$idTrans' and id_menu='$idMenu' and sts_pesan='$stsPesan'");
	
		if(mysqli_num_rows($result2) > 0){
			$response["failed"] = 0;
		}else{
					$result = mysqli_query($conn, "INSERT INTO detail_jual(id_trans, id_menu, nama_menu, hrg_menu, jml_pesan, sts_pesan) VALUES('$idTrans', '$idMenu', '$NamaMenu', '$hrgMenu', '$jmlPesan', '$stsPesan')");
					if($result>0){
						$response["success"] = 1;
					}else{
						$response["failedaaaaa"] = 0;
					}
		}
	}
	

    echo json_encode($response);

    $conn->close();
?>