<?php 
session_start();
include('koneksi.php');
include('header.php');
$sql=mysql_query('select * from transaksi_masuk where status_user=3 and status_invoice=0');
 ?>
 <table border="0" class="table table-striped">
 	<tr>
 		<th>no</th>
 		<th>Invoice</th>
 		<th>kode transaksi</th>
 		<th>tanggal</th>
 		<th>total Qty</th>
 		<th>Grand Total</th>
 		<th>id suplier</th>
 		<th>Surat Jalan</th>
 		<th>No PO</th> 		
 		<th>Tanggal Terima</th>
 		<th>Status</th>

 	</tr>
 	<?php
 	 $no=1;
 	while ($data=mysql_fetch_array($sql)) {?>
 	<tr>
	 	 <td><?php echo $no++; ?></td>
	 	 <td style="color: red;"><?php echo $data['invoice']; ?></td>	 	 
	 	 <td><?php echo $data['kode_transaksi']; ?></td>

	 	 <td><?php echo $data['tgl_transaksi']; ?></td>
	 	 <td><?php echo $data['total']; ?></td>
	 	 <td><?php echo $data['grand_total']; ?></td>
	 	 <?php $qsuplier=mysql_fetch_array(mysql_query("SELECT * FROM suplier WHERE id_suplier='".$data['id_suplier']."'")) ?>
	 	 <td><?php echo $qsuplier['nama']; ?></td>
	 	 <td><?php echo $data['surat_jalan']; ?></td>
	 	 <td><?php echo $data['no_po']; ?></td>
	 	 <td><?php echo $data['tanggal_terima']; ?></td>
 	  	<?php if ($data['bayar']<$data['grand_total']) {?>
 	 	<td style="color: red">Belum Lunas</td>
 	 	<?php }elseif ($data['bayar']==$data['grand_total']) {?>
 	 	<td style="color: blue">lunas</td>
 	 	<?php } ?>

	 	 
 	 </tr>
 	<?php 
 	} 
 	?>
 </table>
 <?php 
 	include ('footer.php');

  ?>