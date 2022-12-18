<?php
error_reporting(0);
include("db_config.php");

$response = array();

	$idTrans = $_POST['id_trans'];
    $idMeja = $_POST['id_meja'];
    $tglTrans = $_POST['tgl_trans'];
	
    $tBayar = 0;
    $kembalian = 0;
    $stsTrans = 'baru';
    
    $gTotal = mysqli_query($conn, "SELECT sum(hrg_menu*jml_pesan) as g_total FROM `detail_jual` WHERE id_trans='$idTrans'") or die(mysqli_error());
while($row = mysqli_fetch_array($gTotal)){
	$nilai = $row["g_total"];
	echo $nilai;
}
if(mysqli_query($conn, "INSERT INTO `master_jual`(`id_trans`, `id_meja`, `tgl_trans`, `grand_total`, `total_bayar`, `kembalian`, `sts_trans`) VALUES('$idTrans', $idMeja, '$tglTrans', $nilai, $tBayar, $kembalian, '$stsTrans')")){
		
			if(mysqli_query($conn, "update detail_jual set sts_pesan='$stsTrans' where id_trans='$idTrans' and sts_pesan='keranjang'")){
				$response["success"] = 1;
			}
	}else{
		$result = mysqli_query($conn, "update `master_jual`set grand_total='$nilai' where id_trans='$idTrans' and sts_trans='baru'");
		if(mysqli_query($conn, "update detail_jual set sts_pesan='$stsTrans' where id_trans='$idTrans' and sts_pesan='keranjang'")){
				$response["success ubah"] = 1;
		}
		
	}
	

echo json_encode($response);

$conn->close();
?>