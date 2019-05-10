<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php 
session_start();
include ('koneksi.php');

$q=mysqli_query($con,"select * from transaksi_keluar where id_transaksi_keluar='".$_GET['id_detail']."'");
$f=mysqli_fetch_array($q);
?>

<div class="box">
	<div class="box-header">
		<center><h2 class="box-title">Surat Jalan</h3></center>
	</div>
	<div class="box-body">

	<br>
	<h3><?php echo "Nomor : ".$f['kode_surat_jalan']; ?></h3>


		<table border="0" class="table table-striped">

			<tr>
				<th>Kode Transaksi</th>
				<td><?php echo $f['kode_transaksi'];?></td>
			</tr>

			<tr>
				<th>Customer</th>
				<?php $qcus=mysqli_fetch_array(mysqli_query($con,'SELECT * FROM customer WHERE id_customer="'.$f['id_customer'].'"')) ?>
				<td><?php echo $qcus['nama'];?>
			</td>
		</tr>
		<tr>
			<th>Tanggal Transaksi</th>
			<td><?php echo $f['tanggal_transaksi']?></td>
		</tr>
		
	</table>
</br>
<table border="0" class="table table-bordered">
	<tr>
		<th>Nama Barang</th>
		<th>Quantity</th>
	</tr>
	<?php  
	
	$querydetail=mysqli_query($con,'select * from transaksi_detail_keluar where id_transaksi_keluar="'.$f['id_transaksi_keluar'].'"');
	$i=0;
	while($data=mysqli_fetch_array($querydetail)) { 
		$i++;

		?>
		<td><input type="hidden" name="idtransaksidetail[]" value="<?php echo $data['id_transaksi_detail_keluar']?>"></td>
		<tr>
			<td><?php $cs=mysqli_query($con,"select * from barang where id_barang='".$data['id_barang']."'");
			while ($databarang=mysqli_fetch_array($cs)) { echo $databarang['nama_barang'];}?>
		</td>
		<td><?php echo $data['qty'] ?></td>

	</tr>

	
	<?php 
} ;?>
<tr>
</tr>
</table>

</div>
</div>
<script>window.print();</script>
</body>
</html>