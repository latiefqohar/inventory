<?php 
session_start();
include('koneksi.php');
// var_dump($_POST);die;

if (isset($_POST['edit'])) {
	$querysave=mysqli_query($con,"update transaksi_keluar set kode_surat_jalan='".$_POST['no_surat_jalan']."', kode_invoice='".$_POST['no_invoice']."', status_transaksi=1 where id_transaksi_keluar='".$_POST['id']."'");

	if ($querysave) {
		header('location:outstanding_transaksi.php');
	}else{
		echo mysqli_error();
	}
	// $query_edit=mysql_query("update transaksi_keluar set tanggal_transaksi='".$_POST['tgl_transaksi']."',
	// 	grand_total='".$_POST['grand_total']."',
	// 	id_customer='".$_POST['id_customer']."' where id_transaksi_keluar='".$_POST['id']."'");

	// if ($query_edit) {
	// 	$data_barang=$_POST['id_barang'];
	// 	$data_qty=$_POST['qty'];
	// 	$data_harga_jual=$_POST['harga_jual'];
	// 	$data_subtotal=$_POST['subtotal'];
	// 	$data_id=$_POST['idtransaksidetail'];
		
	// 	for($i=0;$i<count($data_barang); $i++){
	// 		$barang=$data_barang[$i];
	// 		$qty=$data_qty[$i];
	// 		$harga_jual=$data_harga_jual[$i];
	// 		$subtotal=$data_subtotal[$i];
	// 		$idtransaksidetail=$data_id[$i];
	// 		$query_edit_detail=mysql_query("update transaksi_detail_keluar set id_barang='".$barang."',
	// 	 	qty='".$qty."',	harga_jual='".$harga_jual."',
	// 	 	subtotal='".$subtotal."' where id_transaksi_detail_keluar='".$idtransaksidetail."'");
		 	
	// 	}
	// 	header('location:view_transaksi.php');
	// }else{
	// 	echo mysql_error();
	// }

}

include('header.php');

$q=mysqli_query($con,"select * from transaksi_keluar where id_transaksi_keluar='".$_GET['idtransaksi']."'");
$f=mysqli_fetch_array($q);

$querydataterakhir=mysqli_fetch_array(mysqli_query($con,'SELECT MAX(id_transaksi_keluar) as idterakhir FROM transaksi_keluar'));
$id=$querydataterakhir['idterakhir']+1;
$date=date('Y');
$no_invoice=$id.'/INV/'.$date;

$sj=$id.'/SJ/'.$date;

?>

<form method="post">
<table border="1" class="table table-bordered">
	<td><input type="hidden" name="id" value="<?php echo $f['id_transaksi_keluar'] ?>"></td>
		<tr>
			<td>No Invoice</td>
			<td><input type="text" name="no_invoice" class="form-control" value="<?php echo $no_invoice; ?>" readonly></td>
		</tr>
		<tr>
			<td>No surat jalan</td>
			<td><input type="text" name="no_surat_jalan" class="form-control" value="<?php echo $sj; ?>" readonly></td>
		</tr>

		<tr>
			<td>Kode Transaksi</td>
			<td><input type="text" name="kode_transaksi" class="form-control" id="disabledInput" value="<?php echo $f['kode_transaksi'];?>" disabled></td>
		</tr>
		
		<tr>
			<td>Customer</td>
			<td><select name="id_customer" class="form-control" disabled>
			<option value="">--pilih Customer -- </option>
			<?php $cs=mysqli_query($con,"select * from customer");
				while ($data=mysqli_fetch_array($cs)) { ?>
				<option value="<?php echo $data['id_customer'];?>" <?php if($data['id_customer']==$f['id_customer']){echo "selected";} ?>><?php echo $data['nama'];?></option>
				<?php }?>
			</select>
			</td>
		</tr>
           <tr>
			<td>Tanggal Transaksi</td>
			<td><input type="date" name="tgl_transaksi" class="form-control" value="<?php echo $f['tanggal_transaksi']?>" disabled></td>
		</tr>
		
</table>
</br>
<table border="1" class="table table-bordered">
	<tr>
		<td>Nama Barang</td>
		<td>Qty</td>
		<td>Harga Jual</td>
		<td>Subtotal</td>
		
	</tr>
	<?php  
	
	$querydetail=mysqli_query($con,'select * from transaksi_detail_keluar where id_transaksi_keluar="'.$f['id_transaksi_keluar'].'"');
	$i=0;
	while($data=mysqli_fetch_array($querydetail)) { 
		$i++;
	
	?>
	<td><input type="hidden" name="idtransaksidetail[]" value="<?php echo $data['id_transaksi_detail_keluar']?>"></td>
	<tr>
		<td>
			<select id='id_barang_<?php echo $i;?>' name="id_barang[]"  class="form-control" disabled>
				<option value="">--pilih Barang -- </option>
				<?php $cs=mysqli_query($con,"select * from barang");
					while ($databarang=mysqli_fetch_array($cs)) { ?>
					<option value="<?php echo $data['id_barang'];?>" <?php if($databarang['id_barang']==$data['id_barang']){echo "selected";} ?>><?php echo $databarang['nama_barang'];?></option>
					<?php }?>
				</select>
		</td>
		<td><input type="text" id="qty_<?php echo $i;?>" name="qty[]" class="form-control" value='<?php echo $data['qty'] ?>' disabled></td>
		<td><input type="text" id="harga_<?php echo $i;?>"name="harga_jual[]" class="form-control" value='<?php echo $data['harga_jual'] ?>' disabled></td>
		<td><input type="text" id="subtotal_<?php echo $i;?>"name="subtotal[]" class="form-control subtotal" value='<?php echo $data['subtotal'] ?>' disabled></td>
	</tr>

<!--  -->
	<?php 
	
	} ;?>
	<tr>
		<td>Total</td>
		<td><input type="text" id="tot" class="form-control" name="grand_total" value="<?php echo $f['grand_total']?>" disabled></td>
	</tr>
	<tr>
		<td><input type="submit" name="edit" class="btn btn-success"></td>
		</tr>
	</table>
<?php include('footer.php'); ?>