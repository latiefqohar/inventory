<?php 
session_start();
include ('koneksi.php');
include('header.php');

$q=mysqli_query($con,"select * from transaksi_keluar where id_transaksi_keluar='".$_GET['id_detail']."'");
$f=mysqli_fetch_array($q);
?>

<div class="box">
	<div class="box-header">

		<h2 class="box-title"> INVOICE </h3>
		
	</div>
	<div class="box-body">

		
		<table border="0" class="table table-striped">
			

			<tr>
				<th>Kode Transaksi</th>
				<td><?php echo $f['kode_transaksi'];?></td>
			</tr>
			
			<tr>
				<th>Nomor Surat Jalan</th>
				<td><?php echo $f['kode_surat_jalan'];?></td>
			</tr>

			<tr>
				<th>Customer</th>
				<td><?php
				$querycustomer=mysqli_fetch_array(mysqli_query($con,'SELECT * FROM customer WHERE id_customer="'.$f['id_customer'].'"'));
				 echo $querycustomer['nama'];
				?>
			</td>
		</tr>
		<tr>
			<th>Tanggal Transaksi</th>
			<td><?php echo $f['tanggal_transaksi']?></td>
		</tr>
		
	</table>
</br>
<table border="0" class="table table-striped">
	<tr>
		<th>Nama Barang</th>
		<th>Quantity</th>
		<th>Harga Jual</th>
		<th> Subtotal</th>
		
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
		<td><?php echo $data['harga_jual'] ?></td>
		<td><?php echo $data['subtotal'] ?></td>



	</tr>

	
	<?php 
} ;?>
<tr>
	<th>Grand Total</th>
	<td style="background-color: lightblue; color: red;">Rp. <?php echo $f['grand_total'] ?></td>
</tr>
<tr>
	<br>
	<td><h4>Action Print</h4></td>
	<td><a href="print_invoice.php?id_detail=<?php echo $_GET['id_detail']?>" class="btn btn-info">Print Invoice</a></td>
	<td><a href="print_surat_jalan.php?id_detail=<?php echo $_GET['id_detail'] ?>" class="btn btn-info">Print SJ</a></td>
</tr>
<br>
<tr>
	<td><a href="view_transaksi.php" class="btn btn-success">kembali</a></td>

</tr>
</table>

</div>
</div>
<?php include('footer.php'); ?>