<?php 
include('koneksi.php');
$query_delete=mysql_query("delete from login where id_login='".$_GET['id_loginhapus']."'");
if ("$query_delete") {
	header("location:view_login.php");

}else{
	echo mysql_error();
 }
 ?>