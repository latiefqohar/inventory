<?php 
include 'koneksi.php';
$q=mysql_query("update transaksi_masuk set status_user=1 where id_transaksi='".$_GET['idpr']."'");
if ($q) {
	header('location:view_approve_pr.php');
}else{
	echo mysql_error();
}

 ?>