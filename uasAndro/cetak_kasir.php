<?php
session_start();
include 'config.php';
require('fpdf.php');

$kodetr=$_POST['kode'];

$query = mysqli_query($conn,"select * from master_jual where id_trans='$kodetr'");
$master = mysqli_fetch_assoc($query);

$pdf=new fpdf('P','mm','A4');
$pdf->Addpage();
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'Nota Penjualan',0,1,'C');
$pdf->setfont('Arial','B',16);
$pdf->cell(190,7,'Mediafood',0,1,'C');
$pdf->cell(10,7,'',0,1);

$pdf->setfont('Arial','B',10);
 $pdf->cell(70,6,'Kode : '.$master['id_trans'],0,1);
 $pdf->cell(70,6,'ID Meja : '.$master['id_meja'],0,1);
 //$pdf->cell(70,6,'Tanggal Transaksi : '.$master['tgl_trans'],0,1);
$pdf->setfont('Arial','',10);

$pdf->setfont('Arial','B',12);
 $pdf->cell(20,6,'Kode',1,0,'C');
 $pdf->cell(50,6,'Nama Menu',1,0,'C');
 $pdf->cell(50,6,'Harga Satuan',1,0,'C');
 $pdf->cell(50,6,'Jumlah Pesanan',1,1	,'C');
$pdf->setfont('Arial','',10);

$tbbarang=mysqli_query($conn, "select * from detail_jual where id_trans='$kodetr'");
while($row = mysqli_fetch_array($tbbarang)){
 $pdf->cell(20,6,$row['id_trans'],1,0);
 $pdf->cell(50,6,$row['nama_menu'],1,0);
 $pdf->cell(50,6,$row['hrg_menu'],1,0);
 $pdf->cell(50,6,$row['jml_pesan'],1,1);
}

$pdf->output();
?>