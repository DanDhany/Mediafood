<?php
error_reporting(0);
include("db_config.php");

$response = array();

	$id_meja = $_POST['id_meja'];
    
    $result = mysqli_query($conn, "SELECT * FROM meja where id_meja=$id_meja and sts_meja='dipesan'") or die(mysqli_error());


if(mysqli_num_rows($result) > 0){

	if(mysqli_query($conn, "update meja set sts_meja='kosong' where id_meja=$id_meja")){
		$response["success"] = 1;
	}else{
    $response["failed"] = 0;
    $response["message"] = "Failed To Update";
	}
}

echo json_encode($response);

$conn->close();
?>