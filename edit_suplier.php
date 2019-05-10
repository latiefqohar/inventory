<?php 
include ('koneksi.php');
if (isset($_POST[''])){
$query_edit="update suplier set nama='".$_POST['']."',
alamat='".$_POST['']."',
no_telpon='".$_POST['']."',
status='".$_POST."' where id_suplier='"$_POST['']"'";
$excecute=mysqli_query($con,$query_edit);
if ($excecute) {
	header('location:view_suplier.php');
}else{
	echo mysqli_error();
 }
}
$select_data=mysqli_query($con,"select * from suplier where id_suplier='".$_GET['']."'");
$data=mysqli_fetch_array($select_data);

 ?>
