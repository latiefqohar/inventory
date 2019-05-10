<?php 
session_start();
include ('koneksi.php');
include ('header.php');

$query=mysqli_query($con,"SELECT id_suplier, sum(grand_total) as hutang, sum(bayar) as bayar, sum(grand_total)-sum(bayar) as sisa from transaksi_masuk GROUP BY id_suplier");

$querycus=mysqli_query($con,"SELECT id_customer, sum(grand_total) as hutang, sum(bayar) as bayar, sum(grand_total)-sum(bayar) as sisa from transaksi_keluar GROUP BY id_customer");



 ?>

<h2>Piutang Suplier</h2>

<br><br>
<a href="view_hutangpiutang.php" class="btn btn-success">Kembali</a>
 <table border="1" class="table table-bordered">
 	<tr>
 		<th>No</th>
 		<th>nama suplier</th>
 		<th>hutang</th>
 		<th>telah bayar</th>
 		<th>Sisa hutang</th>
 		<th>Action</th>
 	</tr>
 	<?php
 	$no=1 ;
 	$a=0;
 	$b=0;
 	while ($data=mysqli_fetch_array($query)) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php
 			$qsup=mysqli_fetch_array(mysqli_query($con,"SELECT * from suplier where id_suplier='".$data['id_suplier']."'"));
 			 
 			echo $qsup['nama'];
 			 ?></td>
 			 <td><?php echo $data['hutang']; ?></td>
 			 <td><?php echo $data['bayar']; ?></td>
 			 <td><?php echo $data['sisa']; ?></td>
 			 <?php 
 			 	$a=$a+$data['sisa'];
 			  ?>
 			  <td><a href="view_detail_piutang.php?id_suplier=<?php echo $data['id_suplier'] ?>"> View </a></td>
 		</tr>
 	<?php } ?>
		<tr>
			<td colspan="4" align="right">Total Piutang</td>
	 		<td ><?php echo $a ?></td>
		</tr>

 </table>

 <br><br>
 <h2>Customer</h2>
<br><br>
 <table border="1" class="table table-bordered">
 	<tr>
 		<th>No</th>
 		<th>nama suplier</th>
 		<th>hutang</th>
 		<th>telah bayar</th>
 		<th>Sisa hutang</th>
 	</tr>
 	<?php
 	$no=1 ;
 	while ($datacus=mysqli_fetch_array($querycus)) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php
 			$qcus=mysqli_fetch_array(mysqli_query($con,"SELECT * from customer where id_customer='".$datacus['id_customer']."'"));
 			 
 			echo $qcus['nama'];
 			 ?></td>
 			 <td><?php echo $datacus['hutang']; ?></td>
 			 <td><?php echo $datacus['bayar']; ?></td>
 			 <td><?php echo $datacus['sisa']; ?></td>
 			 <?php $b=$b+$datacus['sisa']; ?>
 			 <td><a href="view_detailhutang.php?id_customer=<?php echo $datacus['id_customer'] ?>"> View </a></td>
 		</tr>
 	<?php } ?>

 		<tr>
			<td colspan="4" align="right">Total Hutang</td>
	 		<td ><?php echo $b ?></td>
		</tr>

 </table>



 <?php include ('footer.php'); ?>