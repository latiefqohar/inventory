<?php 
include 'koneksi.php'; 
if (isset($_POST['save'])) {
	$query_insert="insert into transaksi_masuk_header(kode_transaksi,tgl_transaksi,total,id_suplier)values(
	'".$_POST['fkodetransaksi']."',
	'".$_POST['ftgltransaksi']."',
	'".$_POST['ftotal']."',
	'".$_POST['fidsuplier']."')";
	$proses=mysql_query($query_insert);
	if($proses){
		header('location:view_transaksi_masuk.php');
	}else{
		echo mysql_error();
	}


}
?>
<form method="post">
	<table>
		<tr>
			<td>kode transaksi</td>
			<td><input type="text" name="fkodetransaksi"></td>
		</tr>
		<tr>
			<td>tanggal transaksi</td>
			<td><input type="date" name="ftgltransaksi"></td>

		</tr>
		<tr>
			<td>total</td>
			<td><input type="text" name="ftotal"></td>
		</tr>
		<tr>
			<td>id suplier</td>
			<td><input type="text" name="fidsuplier"></td>			
		</tr>
		<tr>
			<td><input type="submit" name="save"></td>
		</tr>
	</table>	

</form>