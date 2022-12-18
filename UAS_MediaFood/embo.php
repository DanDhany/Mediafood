<?php
error_reporting(0);
include("db_config.php");

$response = array();

	$id_trans = $_POST['id_trans'];
    $result = mysqli_query($conn, "select nama_menu, hrg_menu, jml_pesan, sts_pesan from detail_jual dj where id_trans='$trans' and sts_pesan='baru'") or die(mysqli_error());


if(mysqli_num_rows($result) > 0){
    $response["detail_jual"] = array();

    while ($row = mysqli_fetch_array($result)) {

        $item = array();
        $item["nama"] = $row["nama_menu"];
        $item["status"] = $row["sts_pesan"];
        $item["jumlah"] = $row["jml_pesan"];
        
        array_push($response["detail_jual"], $item);
    }
    $response["success"] = 1;
}else{
    $response["failed"] = 0;
    $response["message"] = "No Items Found";
}

echo json_encode($response);

$conn->close();