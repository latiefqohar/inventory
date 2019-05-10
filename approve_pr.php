<?php 
include 'koneksi.php';
$q=mysqli_query($con,"update transaksi_masuk set status_user=1 where id_transaksi='".$_GET['idpr']."'");
if ($q) {
	header('location:view_approve_pr.php');
}else{
	echo mysqli_error();
}

 ?>