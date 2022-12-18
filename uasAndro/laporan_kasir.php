<?php
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laporan Kasir</title>

	
	<meta charset="utf-8">
	<title>Kasir</title>
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
	<!-- =======================================================
    Theme Name: Moderna
    Theme URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
	======================================================= -->
    

</head>
<body>

    <div id="wrapper">
 <!-- Navigation -->
        <header>
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
						<a class="navbar-brand" href="index.php"><span>Media</span>food</a>
					</div>
					<div class="navbar-collapse collapse ">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Home</a></li>
							<li class="dropdown">
								<!--<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
								<ul class="dropdown-menu">
									<li><a href="typography.html">Typography</a></li>
									<li><a href="components.html">Components</a></li>
									<li><a href="pricingbox.html">Pricing box</a></li>
								</ul>
							</li>-->
							<li><a href="dapur.php">Dapur</a></li>
							<li><a href="kasir.php">Kasir</a></li>
							<li><a href="menu.php">Menu</a></li>
							<li class="active"><a href="laporan_kasir.php">Laporan</a></li>
							<!--<li><a href="contact.html">Contact</a></li>-->
						</ul>
					</div>
				</div>
			</div>
		</header>

<section id="featured">
			<!-- start slider -->

						<!-- end slider -->
					</div>
				
		</section>
		
		<section class="callaction">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="big-cta">
							<div class="cta-text">
								<h2><span>Histori </span>Transaksi</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><br/>
         

<div class="container">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                </div >
            <!-- /.row -->
            <div class="col-lg-14">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>ID Meja</th>
										<!--<th>Tanggal Transaksi</th>-->
										<th>Harga Total</th>		
										<th>Pembayaran</th>
										<th>Kembalian</th>
										<th>Status Transaksi</th>
										
										<th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
								
                                    <?php 
									if(isset($_POST['kirim'])){
									/*$mulai = $_POST['tanggalm'];
									$selesai = $_POST['tanggals'];
									$_SESSION['tanggalm'] = $mulai;
									$_SESSION['tanggals'] = $selesai;
									$tgl = mysqli_query($conn, "select tanggal from master_jual where tgl_trans between '$mulai' and '$selesai'");
									$cari = mysqli_query($conn, "select * from master_jual where tgl_trans between '$mulai' and '$selesai'");*/
									if(mysqli_num_rows($tgl)>=1){
									while ($row = mysqli_fetch_array($cari)){
										$kode = $row['id_trans'];
										$nama = $row['id_meja'];
										//$pel = $row['tgl_trans'];
										$alamat = $row['grand_total'];
										$buyar = $row['total_bayar'];
										$balik = $row['kembalian'];
										$total = $row['sts_trans'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										//$_SESSION['pel'] = $pel;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['buyar'] = $buyart;
										$_SESSION['balik'] = $balik;
										$_SESSION['total'] = $total;
										echo "<tr> <form method=\"post\" action=\"cetak_kasir.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo $_SESSION['nama'];
										echo "</td>";
										/*echo "<td>";
										echo $_SESSION['pel'];
										echo "</td>";*/
										echo "<td>";
										echo $_SESSION['alamat'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['buyar'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['balik'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['total'];
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"detail\" value=\"Cetak\">";
										echo "</td></form></tr>";
										
									}
									?>
									<tfoot>
										<?php
										$results = mysqli_query($conn, "SELECT  SUM(total) AS total FROM master_jual where tanggal between '$mulai' and '$selesai'");
										while ($row = mysqli_fetch_array($results)) {
										?>
									  <tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>Total</th>
										<!--<th colspan="3">Rp. <?php echo $row['total']; ?> ,-</th>-->
									  </tr>

									<?php } ?>
									</tfoot>
									<?php
									}
									else{
									$cari1 = mysqli_query($conn, "select * from master_jual");
									while ($row = mysqli_fetch_array($cari1)){
										$kode = $row['id_trans'];
										$nama = $row['id_meja'];
										//$pel = $row['tgl_trans'];
										$alamat = $row['grand_total'];
										$buyar = $row['total_bayar'];
										$balik = $row['kembalian'];


										$total = $row['sts_trans'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										//$_SESSION['pel'] = $pel;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['buyar'] = $buyar;
										$_SESSION['balik'] = $balik;
										$_SESSION['total'] = $total;
										echo "<tr> <form method=\"post\" action=\"cetak_kasir.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo $_SESSION['nama'];
										echo "</td>";
										/*echo "<td>";
										echo $_SESSION['pel'];
										echo "</td>";*/
										echo "<td>";
										echo $_SESSION['alamat'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['buyar'];										
										echo "</td>";							
										echo "<td>";			
										echo $_SESSION['balik'];				
										echo "</td>";
										echo "<td>";
										echo $_SESSION['total'];
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"detail\" value=\"Detail Transaksi\">";
										echo "</td></form></tr>";
									}
									?>
									<tfoot>
										<?php
										$results = mysqli_query($conn, "SELECT  SUM(total) AS total FROM master_jual ");
										while ($row = mysqli_fetch_array($results)) {
										?>
									  <tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>Total</th>
										<!--<th colspan="3">Rp. <?php echo $row['total']; ?> ,-</th>-->
									  </tr>

									<?php } ?>
									</tfoot>
									<?php
									}
									}else {
									$cari = mysqli_query($conn, "select * from master_jual");
									while ($row = mysqli_fetch_array($cari)){
										$kode = $row['id_trans'];
										$nama = $row['id_meja'];
										//$pel = $row['tgl_trans'];
										$alamat = $row['grand_total'];
										$buyar = $row['total_bayar'];
										$balik = $row['kembalian'];
										$total = $row['sts_trans'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										//$_SESSION['pel'] = $pel;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['buyar'] = $buyar;
										$_SESSION['balik'] = $balik;
										$_SESSION['total'] = $total;
										
										$_SESSION['total'] = $total;
										echo "<tr> <form method=\"post\" action=\"cetak_kasir.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo $_SESSION['nama'];
										echo "</td>";
										/*echo "<td>";
										echo $_SESSION['pel'];
										echo "</td>";*/
										echo "<td>";
										echo $_SESSION['alamat'];
										echo "</td>";
										echo "<td>";
										echo $_SESSION['buyar'];										
										echo "</td>";							
										echo "<td>";			
										echo $_SESSION['balik'];				
										echo "</td>";
										echo "<td>";
										echo $_SESSION['total'];
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"detail\" value=\"Detail Transaksi\">";
										echo "</td></form></tr>";
										
									}?>
									<tfoot>
										<?php
										/*$results = mysqli_query($conn, "SELECT  SUM(total) AS total FROM master_jual");
										while ($row = mysqli_fetch_array($results)) {
										?>
									  <tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th>Total</th>
										<!--<th colspan="3">Rp. <?php //echo $row['total']; ?> ,-</th>-->
									  </tr>

									<?php } */?>
									</tfoot>
									
									<?php } 
									
									?>
									 
                                </tbody>
                            </table>
							<div class="col-lg-2">
							</div>
							
                        
                        </div>
						
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
	
	<!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->

</body>

</html>
