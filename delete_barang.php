<?php 
include('koneksi.php');
$query_delete=mysqli_query($con,"delete from barang where id_barang='".$_GET['id_baranghapus']."'");
if ("$query_delete") {
	header("location:view_barang.php");

}else{
	echo mysqli_error();
 }
 ?>
