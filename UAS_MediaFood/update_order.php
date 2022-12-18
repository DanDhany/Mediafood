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
    $result = mysqli_query($conn, "update detail_jual set jml_pesan='$jmlPesan' where id_trans='$idTrans' and id_menu='$idMenu' and sts_pesan='$stsPesan'");

    if($result>0){
        $response["success"] = 1;
    }else{
        $response["failed"] = 0;
    }

    echo json_encode($response);

    $conn->close();
?>