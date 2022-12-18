<?php
error_reporting(0);
include("db_config.php");

$response = array();

	$id_trans = $_POST['id_trans'];
    $result = mysqli_query($conn, "SELECT * FROM detail_jual where id_trans='$id_trans' and sts_pesan!='selesai'") or die(mysqli_error());


if(mysqli_num_rows($result) > 0){
    $response["detail_jual"] = array();

    while ($row = mysqli_fetch_array($result)) {

        $item = array();
        $item["id_trans"] = $row["id_trans"];
        $item["id_menu"] = $row["id_menu"];
        $item["nama_menu"] = $row["nama_menu"];
        $item["hrg_menu"] = $row["hrg_menu"];
        $item["jml_pesan"] = $row["jml_pesan"];
        $item["sts_pesan"] = $row["sts_pesan"];
        
        array_push($response["detail_jual"], $item);
    }
    $response["success"] = 1;
}else{
    $response["failed"] = 0;
    $response["message"] = "No Items Found";
}

echo json_encode($response);

$conn->close();
?>