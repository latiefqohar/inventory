<?php 
include 'koneksi.php';
$query_delete="delete from customer where id_customer='".$_GET['id-customer']."'";
$excecute=mysql_query($query_delete);
if ($excecute) {
	header('location:view_customer.php');
}else{
	echo mysql_error();
 }
 ?>
