<?php 
session_start();
include('koneksi.php');
include('header.php');
$sql=mysql_query('select * from transaksi_masuk');
 ?>
 <a href="transaksi_pr.php" class="btn btn-success">Tambah PR</a><br>
 <table border="0" class="table table-striped">
 	<tr>
 		<th>no</th>
 		<th>kode transaksi</th>
 		<th>tanggal</th>
 		<th>total</th>
 		<th>id suplier</th>
 		<th>No PO</th>

 		<th>STATUS PR</th>
 		<th>Tanggal terima</th>
 		<th>Status Invoice</th>
 		<th>ACTION</th>
 	</tr>
 	<?php
 	 $no=1;
 	while ($data=mysql_fetch_array($sql)) {?>
 	<tr>
	 	 <td><?php echo $no++; ?></td>
	 	 <td><?php echo $data['kode_transaksi']; ?></td>
	 	 <td><?php echo $data['tgl_transaksi']; ?></td>
	 	 <td><?php echo $data['total']; ?></td>
	 	 <?php $qsuplier=mysql_fetch_array(mysql_query("SELECT * FROM suplier WHERE id_suplier='".$data['id_suplier']."'")) ?>
	 	 <td><?php echo $qsuplier['nama']; ?></td>
	 	 <td><?php echo $data['no_po']; ?></td>
	 	 <td>
	 	 <?php 
	 	 if($data['status_user']==0){
	 	 	echo "menunggu approve";
	 	 } elseif ($data['status_user']==1) {
	 	 	echo "approved";
	 	 }elseif ($data['status_user']==2) {
	 	 	echo "PO created";
	 	 }elseif ($data['status_user']==3) {
	 	 	echo "Received";
	 	 }
	 	 ?></td>

	 	 <td><?php echo $data['tanggal_terima']; ?></td>

	 	 <?php if ($data['bayar']<$data['grand_total']) {?>
 	 	<td style="color: red">Belum Lunas</td>
 	 	<?php }elseif ($data['bayar']==$data['grand_total']) {?>
 	 	<td style="color: blue">lunas</td>
 	 	<?php } elseif ($data['bayar']>$data['grand_total']) {?>
 	 	<td style="color: blue">Lebih Bayar</td>
 	 	<?php } ?>
	 	 
	 	
	 	 <td><a href="view_detail_transaksimasuk.php?id_detail=<?php echo $data['id_transaksi']; ?>"> View Detail</a></td>
	 	 
 	 </tr>
 	<?php 
 	} 
 	?>
 </table>
 <?php 
 	include ('footer.php');

  ?>