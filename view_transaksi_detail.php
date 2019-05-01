<?php 
include('koneksi.php');
$sql=mysql_query('select * from trx_detail');

 ?>
 <table border="1">
 	<tr>
 		<td>no</td>
 		<td>id transaksi masuk</td>
 		<td>id barang</td>
 		<td>qty</td>
 	</tr>
 	<?php $no=1;
 	while ($data=mysql_fetch_array($sql)) {
 	 ?>
 	 <tr>
 	 <td><?php echo $no++; ?></td>
 	 <td><?php echo $data['id_transaksi_masuk']; ?></td>
 	 <td><?php echo $data['id_barang']; ?></td>
 	 <td><?php echo $data['qty']; ?></td>
 	 </tr>
 	<?php } ?>
 </table>