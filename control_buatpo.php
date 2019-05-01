<?php 
include ('koneksi.php');
$date=date('Y');
$query=mysql_fetch_array(mysql_query('select * from transaksi_masuk'));
$id=$query['kode_transaksi'];
$no_po=$id."/ PO /".$date;
$inputpo=mysql_query('UPDATE transaksi_masuk SET no_po="'.$no_po.'" where id_transaksi="'.$_GET['idpr'].'"');
if ($inputpo) {
	$status=mysql_query('UPDATE transaksi_masuk SET status_user=2 where id_transaksi="'.$_GET['idpr'].'"');
	header('location:view_transaksi_masuk.php');
}else{
	echo mysql_error();
}

 ?>