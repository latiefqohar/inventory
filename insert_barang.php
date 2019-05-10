<?php 
include ('koneksi.php');

IF(isset($_POST['save'])){
	$cari=mysqli_query($con,"select * from barang where kode_barang='".$_POST['kodebarang']."'");
	$hasilcari=mysqli_fetch_array($cari);
	if ($hasilcari) {
		echo ("<script type='text/javascript'>
			alert('kode barang sudah ada');document.location='javascript:history.back(1)';</script>");		
	}else{
		$query_insert="insert into barang(nama_barang,qty,harga)values(
		'".$_POST['nama_barang']."',
		'".$_POST['qantity']."',
		'".$_POST['harga']."')";
		$proses=mysqli_query($con,$query_insert);

		if($proses){
			header('location:view_barang.php');
		}else{
		echo mysqli_error();
		}
	}
}
include ('header.php');

 ?>

 <form method="POST">
 <table border="1" class="table table-bordered" >
 	<tr>
 		<th>kode barang</th>
 		<th><input type="text" class="form-control" name="kodebarang"></th>
 	</tr>
 	<tr>
 		<th>nama</th>
 		<th><input type="text" class="form-control" name="nama_barang"></th>
 	</tr>
 	<tr>
 		<th>Qty</th>
 		<th><input type="text" class="form-control" name="qantity"></th>
 	</tr>
 	<tr>
 		<th>harga</th>
 		<th><input type="text" class="form-control" name="harga"></th>
 	</tr>
	<th><input type="submit" name="save"></th>
 </table>
 </form>
 <?php include ('footer.php'); ?>