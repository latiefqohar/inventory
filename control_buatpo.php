<?php 
include ('koneksi.php');
$date=date('Y');
$query=mysqli_fetch_array(mysqli_query($con,'select * from transaksi_masuk'));
$id=$query['kode_transaksi'];
$no_po=$id."/ PO /".$date;
$inputpo=mysqli_query($con,'UPDATE transaksi_masuk SET no_po="'.$no_po.'" where id_transaksi="'.$_GET['idpr'].'"');
if ($inputpo) {
	$status=mysqli_query($con,'UPDATE transaksi_masuk SET status_user=2 where id_transaksi="'.$_GET['idpr'].'"');
	header('location:view_transaksi_masuk.php');
}else{
	echo mysqli_error();
}

 ?>