<?php
include 'Db_config.php';

$response = array();

$read_id = mysqli_query($conn, "select id_trans, id_meja, sts_trans from master_jual where sts_trans='baru'");

$response["id"] = array();
while($row = mysqli_fetch_array($read_id)){
	$id_trans = $row["id_trans"];
	$id_meja = $row["id_meja"];
	$sts_trans = $row["sts_trans"];
	$item = array();
	$item["id_trans"] = $row["id_trans"];
	$item["id_meja"] = $row["id_meja"];
	$item["sts_trans"] = $row["sts_trans"];
	
	array_push($response["id"], $item);
}
echo json_encode($response);