<?php 
include ('koneksi.php');

$qdelete=mysql_query("DELETE transaksi_keluar, transaksi_detail_keluar FROM transaksi_keluar INNER JOIN transaksi_detail_keluar on transaksi_keluar.id_transaksi_keluar=transaksi_detail_keluar.id_transaksi_keluar WHERE transaksi_keluar.id_transaksi_keluar='".$_GET['id_delete']."'");
if ($qdelete) {
	header("location:view_transaksi.php");
}else{
	echo mysql_error();
 
}

 ?>
