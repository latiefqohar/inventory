<?php 
include ('koneksi.php');
if (isset($_POST[''])){
$query_edit="update suplier set nama='".$_POST['']."',
alamat='".$_POST['']."',
no_telpon='".$_POST['']."',
status='".$_POST."' where id_suplier='"$_POST['']"'";
$excecute=mysql_query($query_edit)
if ($excecute) {
	header('location:view_suplier.php');
}else{
	echo mysql_error();
 }
}
$select_data=mysql_query("select * from suplier where id_suplier='".$_GET['']."'");
$data=mysql_fetch_array($select_data);

 ?>
