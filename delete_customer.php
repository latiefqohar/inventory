<?php 
include 'koneksi.php';
$query_delete="delete from customer where id_customer='".$_GET['id-customer']."'";
$excecute=mysqli_query($con,$query_delete);
if ($excecute) {
	header('location:view_customer.php');
}else{
	echo mysqli_error();
 }
 ?>
