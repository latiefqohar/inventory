<?php 
include'koneksi.php';
if (isset($_POST['save'])) {
	$sql_query="insert into trx_detail(id_transaksi_masuk,id_barang,qty)values(
	'".$_POST['fidtransaksimasuk']."',
	'".$_POST['fidbarang']."',
	'".$_POST['fqty']."')";
	$eksekusi=mysql_query($sql_query);
	if ($eksekusi) {
		header('location:view_transaksi_detail.php');
	}else
	echo mysql_error();
}
 ?>
 <form method="post">
 	<table>
 		<tr>
 			<td>id transaksi</td>
 			<td><input type="text" name="fidtransaksimasuk"></td>
 		</tr>
 		<tr>
 			<td>id barang</td>
 			<td><input type="text" name="fidbarang"></td>
 		</tr>
 		<tr>
 			<td>qty</td>
 			<td><input type="text" name="fqty"></td>
 		</tr>
 		<tr><td><input type="submit" name="save"></td></tr>
 	</table>
 </form>