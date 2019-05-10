<?php 
include('koneksi.php');
$query_delete=mysqli_query($con,"delete from login where id_login='".$_GET['id_loginhapus']."'");
if ("$query_delete") {
	header("location:view_login.php");

}else{
	echo mysqli_error();
 }
 ?>