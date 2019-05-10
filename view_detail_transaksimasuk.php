<?php 
session_start();
include ('koneksi.php');
include('header.php');

$q=mysqli_query($con,"select * from transaksi_masuk where id_transaksi='".$_GET['id_detail']."'");
$f=mysqli_fetch_array($q);
?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Detail Header</h3>
	</div>
	<div class="box-body">


		<table border="0" class="table table-striped">

			<tr>
				<th>Kode PR</th>
				<td><?php echo $f['kode_transaksi'];?></td>
			</tr>

			<tr>
				<th>Suplier</th>
				<?php $qcus=mysqli_fetch_array(mysqli_query($con,'SELECT * FROM suplier WHERE id_suplier="'.$f['id_suplier'].'"')) ?>
				<td><?php echo $qcus['nama'];?>
			</td>
		</tr>
		<tr>
			<th>Tanggal Transaksi</th>
			<td><?php echo $f['tgl_transaksi']?></td>
		</tr>
		
	</table>
</br>
<table border="0" class="table table-striped">
	<tr>
		<th>Nama Barang</th>
		<th>Quantity</th>
		<th>Harga Beli</th>
		<th>Subtotal</th>
	</tr>
	<?php  
	
	$querydetail=mysqli_query($con,'select * from transaksi_detail_masuk where id_transaksi_masuk="'.$f['id_transaksi'].'"');
	$i=0;
	while($data=mysqli_fetch_array($querydetail)) { 
		$i++;
		?>
		<td><input type="hidden" name="idtransaksidetail[]" value="<?php echo $data['id_transaksi_detail_masuk']?>"></td>
		<tr>
			<td><?php $cs=mysqli_query($con,"select * from barang where id_barang='".$data['id_barang']."'");
			while ($databarang=mysqli_fetch_array($cs)) { echo $databarang['nama_barang'];}?>
		</td>
		<td><?php echo $data['qty'] ?></td>
		<td><?php echo $data['harga_beli'] ?></td>
		<td><?php echo $data['subtotal'] ?></td>

	</tr>

	<?php 
} ;?>
<tr>
	<td>Grand Total</td>
	<td> <?php echo $f['grand_total'] ?></td>	
</tr>

<br>
<tr>
	<td><a href="view_transaksi_masuk.php" class="btn btn-success">kembali</a></td>
</tr>
</table>

</div>
</div>

<?php include('footer.php'); ?>