<?php
session_start();
include('koneksi.php');
include('header.php'); 
$query_view=mysqli_query($con,"select * from barang");
?>
<a href="insert_barang.php" class="btn btn-warning">Tambah</a>
<br>
<br>
<table border="0" class="table table-striped">
	<tr>
		<th>no</th>
		<th>nama</th>
		<th>qty</th>
		<th>jumlah</th>
		<th colspan="2">action</th>
	</tr>
	<?php
	$no=1;
	while ($data=mysqli_fetch_array($query_view)) {?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $data['nama_barang'];?></td>
		<td><?php echo $data['qty'];?></td>
		<td><?php echo $data['harga'];?></td>
		<td><a href="edit_barang.php?id_barang=<?php echo $data['id_barang'];?> ">edit</a></td>
		<td><a href="delete_barang.php?id_baranghapus=<?php echo $data['id_barang']?>">hapus</a></td>
	</tr>
	<?php
	}
	?>
</table>	
<?php include ('footer.php'); ?>