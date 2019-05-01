<?php  
session_start();

include ('koneksi.php');
include('header.php');


?>
<a href="transaksi1.php" class="btn btn-success">Tambah Data</a> <br> <br>
<table border="0" class="table table-striped">
	<tr>
		<td>kode Transaksi</td>
		<td>Tanggal Transaksi</td>
		<td>Grand Total</td>
		<td>Qty Total</td>
		<td>customer</td>
		<td>status transaksi</td>
		<td>status user</td>
		<td>no surat jalan</td>
		<td>Action</td>
	</tr>
	<?php $query=mysql_query("select * from transaksi_keluar where status_transaksi=0 and status_user=1");
	while($data=mysql_fetch_array($query)){?>
	<tr>
		<td><?php echo $data['kode_transaksi'];?></td>
		<td><?php echo $data['tanggal_transaksi']; ?></td>
		<td><?php echo $data['grand_total']; ?></td>
		<td><?php echo $data['qty_total']; ?></td>
		<?php $idcus=$data['id_customer'];
		$query_cus=mysql_query("select * from customer where id_customer='".$idcus."'");
		$hasilcus=mysql_fetch_array($query_cus);?>
		<td><?php echo $hasilcus['nama']; ?></td>
		<td><?php if($data['status_transaksi']=='0'){
			echo "create transaksi";
		}elseif ($data['status_transaksi']=='1') {
			echo "create surat jalan";
		}elseif ($data['status_transaksi']=='2') {
			echo "create invoice";
		}else{
			echo "complete";
		}
		?></td>
		<td><?php if ($data['status_user']=='0') {
			echo "non approval";
		}elseif ($data['status_user']=='1') {
			echo "approval";
		} 

		?></td>
		<td><?php echo $data['kode_surat_jalan']; ?></td>
		<?php if ($data['kode_surat_jalan']!='') {?>
		<td>surat jalan selesai</td>
		<?php }else { ?>
		<td><a href="transaksi_surat_jalan.php?idtransaksi=<?php echo $data['id_transaksi_keluar'];?>">buat surat jalan</a></td>
		<?php } ?>
	</tr>
	<?php } ?>
	
</table>
<?php include ('footer.php'); ?>