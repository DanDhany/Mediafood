<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';
session_start();

?>
<head>

    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="css/jcarousel.css" rel="stylesheet" />
	<link href="css/flexslider.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />

    <!-- Theme skin -->
	<link href="skins/default.css" rel="stylesheet" />

    <title>Transaksi Penjualan</title>

  

</head>

<body>

    
	<div id="wrapper">
	
	
        <div id="page-wrapper">
		
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transaksi Penjualan</h1>
                    
			<?php
			$_SESSION['kode'] = $_POST['kode'];
			$_SESSION['nama'] = $_POST['nama'];
			$_SESSION['hargacok'] = $_POST['alamat'];
			$kode = $_SESSION['kode'];
			$nama = $_SESSION['nama'];
			$hargacok = $_SESSION['hargacok'];

?>
		<form action="" method="POST" >

<table align="center">
<tr><td><label>ID Transaksi</label></td><td><input class="form-control" type="text" name="kodetr" value="<?php echo $kode; ?>" readonly ></td></tr>
<td><label>ID Meja</label></td><td><input class="form-control" name="nama" id="nama" value="<?php echo $nama; ?>" readonly>
</td>
</tr><br/>
<td><label>Harga Total</label></td><td><input class="form-control" type="number" name="alamat" value="<?php echo $hargacok; ?>" readonly></td></tr><br/>
<td><label>Bayar</label></td><td ><input class="form-control" type="text" name="bayar" id="bayar" placeholder="Masukkan Nominal"></td><td><input class="btn btn-warning" type="submit" value="Bayar" name="btnbayar" ></td></tr>
</tr>
</table>
<div class="col-lg-14">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Penjualan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
										<th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
								
                                <?php 
									$cari = mysqli_query($conn, "select * from detail_jual where id_trans='$kode' and sts_pesan='bayar'");
									while ($row = mysqli_fetch_array($cari)){
										$kode = $row['id_trans'];
										$nama = $row['jml_pesan'];
										$total = $row['hrg_menu'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										$_SESSION['total'] = $total;
										echo "<tr> <form method=\"post\" action=\"pembayaran.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"nama\" value=\"";
										echo $_SESSION['nama']; echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"total\" value=\"";
										echo $_SESSION['total']; echo "\">";
										echo "</td></form></tr>";									
									 } 
									 ?>
									 
                                </tbody>
                            </table>
												<?php

if(isset($_POST['btnbayar'])){
$a = $_POST['kodetr'];
$bayar = $_POST['bayar'];
$rego = $_POST['alamat'];
if($bayar<$rego){
	echo "<script>alert(\"UANG ANDA KURANG!\")</script>";
}else{
$kembalian=$bayar-$rego;
setlocale(LC_ALL, 'en_IN');
echo "<td><h1>Kembalian :</td><td>Rp ";
echo number_format($kembalian,2,",",".");
echo "</h1></td>";


$sqlk = "Update master_jual set grand_total='$rego', total_bayar='$bayar', kembalian='$kembalian', sts_trans='selesai' where  id_trans='$a' " ;
$sqlj = "Update detail_jual set sts_pesan='selesai' where  id_trans='$a' " ;
mysqli_query($conn, $sqlk);
mysqli_query($conn, $sqlj);
}
}


?>
							</div>
							</div>
							</div>
							</div>
		



<script type="text/javascript">    
    <?php echo $nama; ?>  
    function changeValue(nama){  
    document.getElementById('nama').value = detail[nama].nama;
	document.getElementById('harga').value = detail[nama].harga;
    document.getElementById('jumlah').value = detail[nama].jumlah;
	};  
</script> 
</tr>
</table>

</form>


<br />
<br />
		
		<form action="kasir.php" method="POST" align="center">
<table align="center">
<tr ><td width="60px"><input class="btn btn-warning" type="submit" value="Kembali"></td></tr>
</table>
</form>
		
		

                    
                </div>
            </div>
         
        </div>

    </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>