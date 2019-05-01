<?php 
session_start();
include ('koneksi.php');
include ('header.php');

$query=mysql_fetch_array(mysql_query("SELECT sum(grand_total)-sum(bayar) as hutang,
(select sum(grand_total)-sum(bayar) from transaksi_masuk ) as piutang
from transaksi_keluar"));


 ?>

<h2>Laporan Hutang Piutang</h2>
<br><br>
 <table border="1" class="table table-bordered">
 	<tr>
 		<th>HUTANG</th>
 		<td><h3><?php echo $query['hutang'] ?></h3></td>
 	</tr>
 	<tr>
 		<th>PIUTANG</th>
 		<td><h3><?php echo $query['piutang']; ?></h3></td>
 	</tr>
 	
 </table>

 <a href="view_detail_hutang.php" class="btn btn-success">View Detail</a>


 <?php include ('footer.php'); ?>