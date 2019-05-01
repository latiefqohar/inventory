<?php 
session_start();
include('koneksi.php');
include ('header.php');
$sql=mysql_query('select * from transaksi_keluar');

 ?>
 <table border="1" class="table table-bordered">
 	<tr>
 		<th>no</th>
 		<th>kode transaksi</th>
 		<th>tanggal</th>
 		<th>total</th>
 		<th>id customer</th>
 	</tr>
 	<?php $no=1;
 	while ($data=mysql_fetch_array($sql)) {
 	 ?>
 	 <tr>
 	 <td><?php echo $no++; ?></td>
 	 <td><?php echo $data['kode_transaksi']; ?></td>
 	 <td><?php echo $data['tanggal_transaksi']; ?></td>
 	 <td><?php echo $data['qty_total']; ?></td>
 	 <td><?php echo $data['id_customer']; ?></td>
 	 </tr>
 	<?php } ?>
 </table>


 <?php 
 	include ('footer.php');
  ?>