<?php 
session_start();
include('koneksi.php');
include ('header.php');
if (isset($_POST['cari'])){
$query_edit="update barang set nama_barang='".$_POST['nama_barang']."',
 qty='".$_POST['qty']."',
 harga='".$_POST['harga']."'
 where id_barang='".$_POST['idbarang']."'";
 $proses=mysql_query($query_edit);
  if ($proses) {
 	header('location:view_barang.php');
 }else{
 		echo mysql_error();
 } 
 }


 $select_data=mysql_query("select * from barang where id_barang='".$_GET['id_barang']."'");
 $data=mysql_fetch_array($select_data);


 ?>
 <a href="view_barang.php" class="btn btn danger">kembali</a>
 <form method="post">
 	<table class="table table-border">
 		<td><input type="hidden" value="<?php echo $data['id_barang'];?>" name="idbarang"></td>
 	<tr>
 		<td>nama barang</td>
 		<td><input type="text"  class="form form-control" value="<?php echo $data['nama_barang'];?>" name="nama_barang"></td>
 	</tr>
 	<tr>
 		<td>qty</td>
 		<td><input type="text" class="form form-control" value="<?php echo $data['qty'];?>" name="qty"></td>
 	</tr>
 	<tr>
 		<td>harga</td>
 		<td><input type="text" class="form form-control" value="<?php echo $data['harga'];?>" name="harga"></td>
 	</tr>
 	<tr>
 		<td></td>
 		<td><input class="btn btn-primary" type="submit" name="cari"></td>

 	</tr>
 	</table>

 </form>
 <?php include ('footer.php'); ?>