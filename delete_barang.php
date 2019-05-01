<?php 
include('koneksi.php');
$query_delete=mysql_query("delete from barang where id_barang='".$_GET['id_baranghapus']."'");
if ("$query_delete") {
	header("location:view_barang.php");

}else{
	echo mysql_error();
 }
 ?>
