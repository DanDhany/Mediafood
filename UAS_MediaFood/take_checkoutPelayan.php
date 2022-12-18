<?php
error_reporting(0);
include("db_config.php");

$response = array();

	$idTrans = $_POST['id_trans'];
    $idMeja = $_POST['id_meja'];
    $tglTrans = $_POST['tgl_trans'];

	$update_detail = mysqli_query($conn, "update detail_jual set sts_pesan='bayar' where id_trans='$idTrans'");
	$update_master = mysqli_query($conn, "update master_jual set sts_trans='bayar' where id_trans='$idTrans' and id_meja=$idMeja");
	$update_meja = mysqli_query($conn, "update meja set sts_meja='kosong' where id_meja=$idMeja");
	if($update_detail>0 && $update_master>0 && $update_meja>0){
		$response["success"] = 1;
	}
	

echo json_encode($response);

$conn->close();
?>