<?php
include 'config.php';
$page = $_SERVER['PHP_SELF'];
$sec = "3";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Dapur</title>
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="" />
	<!-- css -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
	<link href="css/jcarousel.css" rel="stylesheet" />
	<link href="css/flexslider.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
<style>
	input.form-arupa{
	text-align: center;
	background: #f8f8f8;
border: none;
border-color: transparent;
}</style>
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
		<!-- start header -->
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
							<!--<li class="dropdown">-->
								<!--<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <b class=" icon-angle-down"></b></a>
								<ul class="dropdown-menu">
									<li><a href="typography.html">Typography</a></li>
									<li><a href="components.html">Components</a></li>
									<li><a href="pricingbox.html">Pricing box</a></li>
								</ul>
							</li>-->
							<li class="active"><a href="dapur.php">Dapur</a></li>
							<li><a href="kasir.php">Kasir</a></li>
							<li><a href="menu.php">Menu</a></li>
							<li><a href="laporan_kasir.php">Laporan</a></li>
							<!--<li><a href="contact.html">Contact</a></li>-->
						</ul>
					</div>
				</div>
				
			</div>
		</header>
		<!-- end header -->
			<!-- start slider -->

						<!-- end slider -->
		</div>

		
		
		<section class="callaction">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="big-cta">
							<div class="cta-text">
								<h2><span>Da</span>pur</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		

		<!--<section id="content">
			<div class="container">
				<div class="row">
				<div class="col-lg-12">     
                            <div class="row">
							<div class="col-lg-3">
                                <div >-->
								
                                    <?php

	$sqlc = "select count(*)as jum from detail_jual";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;

if(isset($_POST['delete'])){
											$a = $_POST['id'];
											
										$sql1 = "Delete from detail_jual where id_trans='$a'";
										mysqli_query($conn, $sql1);
										$sqlc = "select count(*)as jum from detail_jual";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;
										}

										if(isset($_POST['update'])){
											$a = $_POST['id'];
											$b = $_POST['nama_pesanan'];
											$c = $_POST['harga'];
											$d = $_POST['jumala'];
											$e = $_POST['status'];

										$sql2 = "update detail_jual
										set sts_pesan='Proses' where id_trans='$a' AND nama_menu='$b' AND jml_pesan='$d'";
										mysqli_query($conn, $sql2);
										$sqlc = "select count(*)as jum from detail_jual";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;
										}
										if(isset($_POST['updateSaji'])){
											$a = $_POST['id'];
											$b = $_POST['nama_pesanan'];
											$c = $_POST['harga'];
											$d = $_POST['jumala'];
											$e = $_POST['status'];

										$sql2 = "update detail_jual
										set sts_pesan='siap saji' where id_trans='$a' AND nama_menu='$b' AND jml_pesan='$d' and sts_pesan='Proses'";
										mysqli_query($conn, $sql2);
										$sqlc = "select count(*)as jum from detail_jual";
										$result1= mysqli_query($conn, $sqlc);
										$row = mysqli_fetch_assoc($result1);
										$jumlahrecord= "BRG".($row["jum"]+1);
										$_SESSION["datatr"]=$jumlahrecord;
										}

/*if(isset($_POST['update'])){
											$a1 = $_POST['id'];
											$b1 = $_POST['nama_pesanan'];
											$c1 = $_POST['harga'];
											$d1 = $_POST['status'];
										?>	
										<form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>ID</label>
                                            <input class="form-control" name="id" value="<?php echo $a1; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Nama Pesanan</label>
                                            <input class="form-control" name="nama_pesanan" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" value="<?php echo $c1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Status</label>
                                            <input class="form-control" name="status" value="<?php echo $d1; ?>" required>
                                        </div>										                                      
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>
	
<?php
}*/
				/*					$sql1 = "SELECT * from pesanan";
										$result1 = mysqli_query($conn, $sql1);
										$sql2 = "SELECT * from pesanan where id=4";
										$result2 = mysqli_query($conn, $sql2);
									
										if (mysqli_num_rows($result1) > 0) {
											while($row = mysqli_fetch_assoc($result1)) {
											
												echo "<div class=\"box\">";
												echo "<div class=\"box-gray aligncenter\">";
												echo "<tr><form action=\"\" method=\"POST\">";												
																								
												echo "<td> <input type=\"text\" class=\"form-arupa\" name=\"id\" value=\"";										
												echo "Transaksi "; 
												echo $row["id"]; 
												echo "\">";
												echo "</td>";
												echo "<div class=\"icon\">";
												echo "<i class=\"fa fa-desktop fa-3x\"></i>";
												echo "</div>";
												echo "<td> <input type=\"text\" class=\"form-arupa\" name=\"nama_pesanan\" value=\"";
												echo $row["nama_pesanan"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-arupa\" name=\"harga\" value=\"";
												echo $row["harga"];echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-arupa\" name=\"status\" value=\"";
												echo $row["status"]; echo "\">";
												echo "</td>";
												
												while($row = mysqli_fetch_assoc($result2)) {
												
												}
												//echo $row["nama_pesanan"]; echo"<br/>";
												//echo "Status: "; echo $row["status"];
												echo "</div>";
												
												}
												echo "<td><input class=\"butn butn-bord\" type=\"submit\" name=\"update\" value=\"Terima\"></td>";
												echo "<td><input class=\"butn butn-bg\"type=\"submit\" name=\"delete\" value=\"Tolak\"></td>";
												echo "</form></tr>";	
										} else {
											echo "0 results";
										};
											echo "</table>";*/
										mysqli_close($conn);

										?>
									
										
										<!--</div>
												</div>
												</div>
												</div>
										
		</div>
                            /.row (nested) -->
							
                        <!-- </div>
                        /.panel-body -->
	<br/>
		<div class="container">
        <div id="page-wrapper">
            <div class="row">
              <div class="col-lg-14">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel Pesanan
                        </div>
						<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Menu</th>
                                        <th>Nama Menu</th>
										<th>Jumlah</th>									
										<th>Status Pesanan</th>
										<th>Proses</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
					include 'config.php';
					$sql1 = "SELECT * from detail_jual where sts_pesan='baru' or sts_pesan='Proses'";
										$result1 = mysqli_query($conn, $sql1);
					
												

										if (mysqli_num_rows($result1) > 0) {
											while($row = mysqli_fetch_assoc($result1)) {
												echo "<tr><form action=\"\" method=\"POST\"> <td> <input type=\"text\" class=\"form-control\" name=\"id\" value=\"";
												echo $row["id_trans"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"nama_pesanan\" value=\"";
												echo $row["nama_menu"]; echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"harga\" value=\"";
												echo $row["hrg_menu"];echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"jumala\" value=\"";
												echo $row["jml_pesan"];echo "\">";
												echo "</td>";
												echo "<td> <input type=\"text\" class=\"form-control\" name=\"status\" value=\"";
												echo $row["sts_pesan"]; echo "\">";
												echo "</td>";
												echo "<td><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Proses Menu\"></td>";
												echo "<td><input class=\"btn btn-warning\" type=\"submit\" name=\"updateSaji\" value=\"Siap Saji\"></td>";
												echo "<td><input class=\"btn btn-danger\"type=\"submit\" name=\"delete\" value=\"Delete\"></td>";
												echo "</form></tr>";
											}
										}
										echo "</tbody></table></div>";
										mysqli_close($conn);
					?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

			
										
	
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