<?php
error_reporting(0);
include("db_config.php");

$response = array();


    $result = mysqli_query($conn, "SELECT * FROM menu where sts_menu='ada'") or die(mysqli_error());


if(mysqli_num_rows($result) > 0){
    $response["meja"] = array();

    while ($row = mysqli_fetch_array($result)) {

        $item = array();
        $item["id_menu"] = $row["id_menu"];
		$item["nama_menu"] = $row["nama_menu"];
		$item["hrg_menu"] = $row["hrg_menu"];
        $item["sts_menu"] = $row["sts_menu"];

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