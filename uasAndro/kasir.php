<?php
include 'config.php';
$page = $_SERVER['PHP_SELF'];
$sec = "3";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
  
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
							<li class="active"><a href="kasir.php">Kasir</a></li>
							<li><a href="menu.php">Menu</a></li>
							<li><a href="laporan_kasir.php">Laporan</a></li>
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
								<h2><span>Ka</span>sir</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><br/>
		
	
			<div class="container">
		
        <div id="page-wrapper">
            <div class="row">
                
            <!-- /.row -->
            <div class="col-lg-14">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transaksi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<!--<form action="" method="POST">
							<div class="form-group">
								<label>Tanggal Mulai</label>
								<input type="date" class="form-control" name="tanggalm">
                            </div>
							<div class="form-group">
								<label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggals">
                            </div>
							<button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
							<br><br>
						</form>-->
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>ID Meja</th>
										<th>Harga Total</th>									
										<th>Status Transaksi</th>
										<th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
								
                                <?php 
									$cari = mysqli_query($conn, "select * from master_jual where sts_trans='bayar'");
									while ($row = mysqli_fetch_array($cari)){
										$kode = $row['id_trans'];
										$nama = $row['id_meja'];
										$alamat = $row['grand_total'];
										$total = $row['sts_trans'];
										$_SESSION['kode'] = $kode;
										$_SESSION['nama'] = $nama;
										$_SESSION['alamat'] = $alamat;
										$_SESSION['total'] = $total;
										echo "<tr> <form method=\"post\" action=\"pembayaran.php\">";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"kode\" value=\"";
										echo $_SESSION['kode']; echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"nama\" value=\"";
										echo $_SESSION['nama']; echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"alamat\" value=\"";
										echo $_SESSION['alamat']; echo "\">";
										echo "</td>";
										echo "<td> <input type=\"text\" class=\"form-control\" name=\"total\" value=\"";
										echo $_SESSION['total']; echo "\">";
										echo "</td>";
										echo "<td>";
										echo "<input class=\"btn btn-warning\" type=\"submit\" name=\"proses\" value=\"Bayar\">";
										echo "</td></form></tr>";									
									?>

									<?php } ?>
									 
                                </tbody>
                            </table>
							<!--<div class="col-lg-2">
							<a href="cetak_kasir.php" class="btn btn-lg btn-warning btn-block">Print</a>
							</div>-->
							
                        
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
		
		</div>
		
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
	<!-- javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.fancybox.pack.js"></script>
	<script src="js/jquery.fancybox-media.js"></script>
	<script src="js/google-code-prettify/prettify.js"></script>
	<script src="js/portfolio/jquery.quicksand.js"></script>
	<script src="js/portfolio/setting.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>
