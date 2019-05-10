<?php  
session_start();

include ('koneksi.php');
include('header.php');


?>
<a href="transaksi1.php" class="btn btn-success">Tambah Data</a> <br> <br>
<table border="0" class="table table-striped">
	<form action="view_transaksi.php" method="GET">
		<tr>
			<td>
				<label for="fcari">Cari</label>
			</td>
			<td>
				<input type="text" name="fcari">
			</td>
			<td>
				<input type="submit" name="cari">
			</td>
		</tr>
	</form>
	<?php 
	if (isset($_GET['cari'])){
	$query=mysqli_query($con,"select * from transaksi_keluar where kode_transaksi LIKE '%".$_GET['fcari']."%' ");
	}else{
	$query=mysqli_query($con,"select * from transaksi_keluar ");	
	}
	?>
	<tr>
		<th>kode Transaksi</th>
		<th>Tanggal Transaksi</th>
		<th>Grand Total</th>
		<th>Qty Total</th>
		<th>customer</th>
		<th>status transaksi</th>
		<th>status user</th>
		<th colspan="3">Action</th>
		<th colspan="2">Invoice</th>
	</tr>
	<?php 
	while($data=mysqli_fetch_array($query)){?>
	<tr>
		<td><?php echo $data['kode_transaksi'];?></td>
		<td><?php echo $data['tanggal_transaksi']; ?></td>
		<td><?php echo $data['grand_total']; ?></td>
		<td><?php echo $data['qty_total']; ?></td>
		<?php $idcus=$data['id_customer'];
		$query_cus=mysqli_query($con,"select * from customer where id_customer='".$idcus."'");
		$hasilcus=mysqli_fetch_array($query_cus);?>
		<td><?php echo $hasilcus['nama']; ?></td>
		<td><?php if($data['status_transaksi']=='0'){
			echo "create transaksi";
		}elseif ($data['status_transaksi']=='1') {
			echo "created surat jalan and invoice";
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
		<td><a href="edit_transaksi.php?idtransaksi=<?php echo $data['id_transaksi_keluar'];?>">edit</a></td>
		<td><a href="delete_transaksi.php?id_delete=<?php echo $data['id_transaksi_keluar'];?>">delete</a></td>
		<td><a href="view_detail.php?id_detail=<?php echo $data['id_transaksi_keluar']; ?>">detail</a></td>
		<?php 
		if ($data['status_transaksi']=='1') {?>
		<td><a href="view_invoice.php?id_detail=<?php echo $data['id_transaksi_keluar']; ?>">view Invoice</a></td>
		<?php if ($data['status_invoice']=='0'){ ?>
		<td style="color: red">Invoice belum dibayar</td>
		<?php } ?>
		
		<?php
		};

		 ?>
		
	</tr>
	<?php } ?>
	
</table>
<?php include ('footer.php'); ?>