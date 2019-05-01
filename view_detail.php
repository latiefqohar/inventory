<?php 
session_start();
include ('koneksi.php');
include('header.php');

$q=mysql_query("select * from transaksi_keluar where id_transaksi_keluar='".$_GET['id_detail']."'");
$f=mysql_fetch_array($q);
?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Detail Header</h3>
	</div>
	<div class="box-body">


		<table border="0" class="table table-striped">

			<tr>
				<th>Kode Transaksi</th>
				<td><?php echo $f['kode_transaksi'];?></td>
			</tr>

			<tr>
				<th>Customer</th>
				<?php $qcus=mysql_fetch_array(mysql_query('SELECT * FROM customer WHERE id_customer="'.$f['id_customer'].'"')) ?>
				<td><?php echo $qcus['nama'];?>
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
	</tr>
	<?php  
	
	$querydetail=mysql_query('select * from transaksi_detail_keluar where id_transaksi_keluar="'.$f['id_transaksi_keluar'].'"');
	$i=0;
	while($data=mysql_fetch_array($querydetail)) { 
		$i++;

		?>
		<td><input type="hidden" name="idtransaksidetail[]" value="<?php echo $data['id_transaksi_detail_keluar']?>"></td>
		<tr>
			<td><?php $cs=mysql_query("select * from barang where id_barang='".$data['id_barang']."'");
			while ($databarang=mysql_fetch_array($cs)) { echo $databarang['nama_barang'];}?>
		</td>
		<td><?php echo $data['qty'] ?></td>

	</tr>

	<?php 
} ;?>
<br>
<tr>
	<td><a href="view_transaksi.php" class="btn btn-success">kembali</a></td>
</tr>
</table>

</div>
</div>
<?php include('footer.php'); ?>