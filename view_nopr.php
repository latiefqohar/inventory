<?php 
session_start();
include('koneksi.php');
include('header.php');
$sql=mysqli_query($con,'select * from transaksi_masuk where status_user=1');
 ?>
 <table border="0" class="table table-striped">
 	<tr>
 		<th>no</th>
 		<th>kode transaksi</th>
 		<th>tanggal</th>
 		<th>total Qty</th>
 		<th>Grand Total</th>
 		<th>id suplier</th>
 		<th colspan="2"><center>ACTION</center></th>
 	</tr>
 	<?php
 	 $no=1;
 	while ($data=mysqli_fetch_array($sql)) {?>
 	<tr>
	 	 <td><?php echo $no++; ?></td>
	 	 <td><?php echo $data['kode_transaksi']; ?></td>
	 	 <td><?php echo $data['tgl_transaksi']; ?></td>
	 	 <td><?php echo $data['total']; ?></td>
	 	 <td><?php echo $data['grand_total']; ?></td>
	 	 <?php $qsuplier=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM suplier WHERE id_suplier='".$data['id_suplier']."'")) ?>
	 	 <td><?php echo $qsuplier['nama']; ?></td>
	 	 <td><a href="">Detail</a></td>
	 	 <td><a href="control_buatpo.php?idpr=<?php echo $data['id_transaksi']; ?>">Buat PO</a></td>
 	 </tr>
 	<?php 
 	} 
 	?>
 </table>
 <?php 
 	include ('footer.php');

  ?>