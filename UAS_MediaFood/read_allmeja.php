<?php
error_reporting(0);
include("db_config.php");

$response = array();


    $result = mysqli_query($conn, "SELECT * FROM meja") or die(mysqli_error());


if(mysqli_num_rows($result) > 0){
    $response["meja"] = array();

    while ($row = mysqli_fetch_array($result)) {

        $item = array();
        $item["id_meja"] = $row["id_meja"];
		$item["ket"] = $row["ket"];
        $item["sts_meja"] = $row["sts_meja"];

        array_push($response["meja"], $item);
    }
    $response["success"] = 1;
}else{
    $response["success"] = 0;
    $response["message"] = "No Items Found";
}

echo json_encode($response);

$conn->close();
?>