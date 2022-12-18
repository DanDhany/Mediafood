<?php
error_reporting(0);
include("db_config.php");


$response = array();

$read = mysqli_query($conn, "select m.id_meja, (select mj.id_trans from master_jual mj where m.id_meja=mj.id_meja and sts_trans='baru') as id_transaksi, (select dj.nama_menu, dj.harga_menu, dj.jml_pesan, dj.sts_pesan from detail_jual dj where mj.id_trans=dj.id_trans) from meja m");

if(mysqli_num_rows($read) > 0){
 $response["menu"] = array();
 while($row = mysqli_fetch_array($read)){
  $item = array();
  $item["id"] = $row["id_meja"];
  $item["nama"] = $row["id_transaksi"];
  $item["harga"] = $row["nama_menu"];
  $item["jenis"] = $row["harga_menu"];
  $item["tipe"] = $row["jml_pesan"];
  $item["status"] = $row["sts_pesan"];
    
  array_push($response["menu"], $item);
 }
}else{
	$response["message"] = "No Items Found";
}

echo json_encode($response);

$conn->close();
?>