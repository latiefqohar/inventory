<?php 
include 'koneksi.php'; 
if (isset($_POST['save'])) {
	$query_insert="insert into transaksi_keluar(kode_transaksi,tanggal_transaksi,total,id_customer)values(
	'".$_POST['fkodetransaksi']."',
	'".$_POST['ftgltransaksi']."',
	'".$_POST['ftotal']."',
	'".$_POST['fidcustomer']."')";
	$proses=mysqli_query($con,$query_insert);
	if($proses){
		header('location:view_transaksi_keluar.php');
	}else{
		echo mysqli_error();
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
			<td><input type="text" name="fidcustomer"></td>			
		</tr>
		<tr>
			<td><input type="submit" name="save"></td>
		</tr>
	</table>	

</form>