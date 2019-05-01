<?php 
include 'koneksi.php'; 
if (isset($_POST['save'])) {
	$query_insert="insert into suplier(nama,alamat,no_telpon,status)values(
	'".$_POST['nama']."',
	'".$_POST['alamat']."',
	'".$_POST['no_telpon']."',
	'".$_POST['status']."')";
	$proses=mysql_query($query_insert);
	if($proses){
		header('location:view_suplier.php');
	}else{
		echo mysql_error();
	}


}
?>
<form method="post">
	<table>
		<tr>
			<td>nama</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>alamat</td>
			<td><input type="text" name="alamat"></td>

		</tr>
		<tr>
			<td>no telpon</td>
			<td><input type="text" name="no_telpon"></td>
		</tr>
		<tr>
			<td>status</td>
			<td><input type="text" name="status"></td>			
		</tr>
		<tr>
			<td><input type="submit" name="save"></td>
		</tr>
	</table>	

</form>