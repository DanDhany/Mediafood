<?php
include 'config.php';

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
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
							<li class="active"><a href="menu.php">Menu</a></li>
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
								<h2><span>Me</span>nu</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><br/>
		
	
			<div class="container">
		
        <div id="page-wrapper">
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Setup Menu
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<?php
								include 'config.php';
								$sqlc = "select count(*)as jum from menu";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= ($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;

								if(isset($_POST['submit'])){
									$a = $_POST['nik'];
									$b = $_POST['nama'];
									$c = $_POST['telp'];
									$d = $_POST['jkel'];

								$sql = "INSERT INTO menu
								VALUES ('$a', '$b', '$c', '$d')";
								$result = mysqli_query($conn, $sql);
								$sqlc = "select count(*)as jum from menu";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= ($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;
								}

								if(isset($_POST['delete'])){
									$a = $_POST['nik'];
									
								$sql1 = "Delete from menu where id_menu='$a'";
								mysqli_query($conn, $sql1);
								$sqlc = "select count(*)as jum from menu";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= ($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;
								}

								if(isset($_POST['submitupdate'])){
									$a = $_POST['nik'];
									$b = $_POST['nama'];
									$c = $_POST['telp'];
									$d = $_POST['jkel'];

								$sql2 = "update menu set nama_menu='$b', hrg_menu='$c', sts_menu='$d' where id_menu='$a'";
								mysqli_query($conn, $sql2);
								$sqlc = "select count(*)as jum from menu";
								$result1= mysqli_query($conn, $sqlc);
								$row = mysqli_fetch_assoc($result1);
								$jumlahrecord= ($row["jum"]+1);
								$_SESSION["datatr"]=$jumlahrecord;
								}


								if(isset($_POST['update'])){
									$a1 = $_POST['nik'];
									$b1 = $_POST['nama'];
									$c1 = $_POST['telp'];
									$d1 = $_POST['jkel'];
								?>
										<form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>ID Menu</label>
                                            <input class="form-control" name="nik" value="<?php echo $a1; ?>" readonly >
                                        </div>
										<div class="form-group">
                                            <label>Nama Menu</label>
                                            <input class="form-control" name="nama" value="<?php echo $b1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga Menu</label>
                                            <input class="form-control" name="telp" value="<?php echo $c1; ?>" required>
                                        </div>
										<div class="form-group">
                                            <label>Status Menu</label>
											<input type="radio" name="jkel" value="ada" <?php if($d1=="ada"){echo "checked";}?>> Ada <input type="radio" name="jkel" value="kosong" <?php if($d1=="kosong"){echo "checked";}?>> Kosong
                                        </div>
                                        
                                        <button type="submit" name="submitupdate" class="btn btn-warning">Ubah</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>

<?php
}else{
	

?>
                                    <form role="form" action="" method="POST">
                                        <div class="form-group">
                                            <label>ID Menu</label>
                                            <input class="form-control" name="nik" placeholder="Masukkan ID Menu" value="<?php echo $jumlahrecord; ?>" readonly>
                                        </div>
										<div class="form-group">
                                            <label>Nama Menu</label>
                                            <input class="form-control" name="nama" placeholder="Masukkan Nama Menu" required>
                                        </div>
										<div class="form-group">
                                            <label>Harga Menu</label>
                                            <input class="form-control" name="telp" placeholder="Masukkan Harga Menu" required>
                                        </div>
										<div class="form-group">
                                            <label>Status Menu</label>
											<input  type="radio" name="jkel" value="ada"> Ada <input type="radio" name="jkel" value="kosong"> Kosong
                                        </div>
										
                                        
                                        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </form>
									<?php
}
?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
				<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Menu
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div >
                                    <?php


									$sql1 = "SELECT * from menu";
									$result1 = mysqli_query($conn, $sql1);

											echo "<div class=\"table-responsive\"><table class=\"table table-striped\">";
											echo "<tr><td>";
											echo "ID Menu </td><td>";
											echo "Nama Menu</td><td>";
											echo "Harga Menu</td><td>";
											echo "Status</td><td>";
											echo "</tr>";
									if (mysqli_num_rows($result1) > 0) {
										while($row = mysqli_fetch_assoc($result1)) {
											echo "<tr><form action=\"\" method=\"POST\"> <td> <input type=\"text\" class=\"form-control\" name=\"nik\" value=\"";
											echo $row["id_menu"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"nama\" value=\"";
											echo $row["nama_menu"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"telp\" value=\"";
											echo $row["hrg_menu"]; echo "\">";
											echo "</td>";
											echo "<td> <input type=\"text\" class=\"form-control\" name=\"jkel\" value=\"";
											echo $row["sts_menu"]; echo "\">";
											echo "</td>";
											echo "<td><input class=\"btn btn-warning\" type=\"submit\" name=\"update\" value=\"Update\"></td>";
											echo "<td><input class=\"btn btn-danger\" type=\"submit\" name=\"delete\" value=\"Delete\"></td>";
											echo "</form></tr>";
										}
									} else {
										echo "0 results";
									}
									echo "</table></div>";
									mysqli_close($conn);

									?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
							
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
            
		
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
