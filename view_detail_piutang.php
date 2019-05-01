<?php 
session_start();
include ('koneksi.php');
include ('header.php');

$query=mysql_query("SELECT * from transaksi_masuk where id_suplier='".$_GET['id_suplier']."'");



 ?>

<h2>Piutang Suplier</h2>

<br><br>
<a href="view_detail_hutang.php" class="btn btn-success">Kembali</a>
<br>
<?php $total=0; ?>
 <table border="1" class="table table-bordered">
 
 	<tr>
 		<th>No</th>
 		<th>nama suplier</th>
 		<th>tanggal</th>
 		<th>Total Barang</th>
 		<th>Grand Total</th>
 		<th>Bayar</th>
 		<th>sisa Hutang</th>
 	</tr>
 	<?php
 	$no=1 ;
 	$a=0;
 	$b=0;
 	while ($data=mysql_fetch_array($query)) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php
 			$qsup=mysql_fetch_array(mysql_query("SELECT * from suplier where id_suplier='".$data['id_suplier']."'"));
 			 
 			echo $qsup['nama'];
 			 ?></td>
 			 <td><?php echo $data['tgl_transaksi']; ?></td>
 			 <td><?php echo $data['total']; ?></td>
 			 <td><?php echo $data['grand_total']; ?></td>
 			 <td><?php echo $data['bayar']; ?></td>
 			 <?php $sisa=$data['grand_total']-$data['bayar'];
 			 	$total+=$sisa;
 			  ?>
 			 <td><?php echo $sisa; ?></td>
 		</tr>
 		
 	<?php } ?>
 	<tr>
 		<td colspan="6" align="right">Sisa Piutang</td>
	 	<td >
	 	<?php
	 	echo $total;
	 	?>
	 	</td>
 	</tr>


 </table>


 <?php include ('footer.php'); ?>