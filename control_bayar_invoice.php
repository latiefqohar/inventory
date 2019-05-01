<?php 
include ('koneksi.php');
$query=mysql_query("UPDATE transaksi_masuk SET status_invoice=1 WHERE id_transaksi='".$_GET['idpr']."'");
if ($query) {
	header('location:view_invoice_barangmasuk.php');
}else{
	echo mysql_error();
}

 ?>