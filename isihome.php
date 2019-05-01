<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap-grid.css" type="text/css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css" type="text/css">

<style>
		.grid-container{
			display:grid;
			grid-template-columns: auto auto auto;
			background-color: darkblue;
			padding: 10px;
		}
		.grid-item{
			background-color: rgba(255,255,255,0.8);
			border: 1px solid;
			padding: 20px;
			font-size: 30px;
			text-align: center;
		}
</style>


</head>
</html>
<?php 
session_start();
if ($_SESSION['status']=='1') {
	
echo 'hallo '.$_SESSION['username'];
echo '<br> anda login sebagai '.$_SESSION['level'];
echo '<br> anda bisa akses <br>';
 ?>
 <?php 
if ($_SESSION['level']=='admin') {?>
	<a href="view_login.php">Master User</a><br>
	<a href="view_barang.php">master barang</a><br>
	<a href="">master customer</a><br>
	<a href="">master suplier</a><br>
 <?php }else{ ?>
 	<a href="">input keuangan</a><br>
 	<a href="">input karyawan</a><br>
 	<?php } ?>
 	<a href="logout.php">logout</a><br><br><br>
 <?php 
}else {
	echo ("<script type='text/javascript'>
	alert('user anda tidak aktif');document.location='javascript:history.back(1)';</script>");
}

  ?>    