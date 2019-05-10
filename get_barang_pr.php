<?php 
include ('koneksi.php');
$id_barang=$_GET['id_barang'];
$query=mysqli_query($con,"select * from barang where id_barang='$id_barang'");
$fe=mysqli_fetch_array($query);
$harga=$fe['harga_beli'];
echo $harga;
 ?>