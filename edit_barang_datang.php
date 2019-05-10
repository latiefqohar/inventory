<?php 
session_start();
include('koneksi.php');

if (isset($_POST['edit'])) {
	$query_edit=mysqli_query($con,"update transaksi_masuk set surat_jalan='".$_POST['surat_jalan']."',
		invoice='".$_POST['invoice']."', Tanggal_terima=CURDATE(), status_user=3 where id_transaksi='".$_POST['id']."'");

	if ($query_edit) {
		$data_barang=$_POST['id_barang'];
		$data_qty=$_POST['qty'];

		
		for($i=0;$i<count($data_barang); $i++){
			$barang=$data_barang[$i];
			$qty=$data_qty[$i];
			$query_isert_qty=mysqli_query($con,"update barang SET qty=qty+" . $qty. " WHERE id_barang='" . $barang . "'");
			
		}
		header('location:view_barang_datang.php');
	}else{
		echo mysqli_error();
	}

}
include('header.php');

$q=mysqli_query($con,"select * from transaksi_masuk where id_transaksi='".$_GET['idpr']."'");
$f=mysqli_fetch_array($q);


?>

<form method="post">
	<table border="1" class="table table-bordered">
		<td><input type="hidden" name="id" value="<?php echo $f['id_transaksi'] ?>"></td>

		<tr>
			<td>Kode Transaksi</td>
			<td><input type="text" name="kode_transaksi" class="form-control"  value="<?php echo $f['kode_transaksi'];?>" readonly></td>
		</tr>
		<tr>
			<td>No PO</td>
			<td><input type="text" name="no_po" class="form-control"  value="<?php echo $f['no_po'];?>" readonly></td>
		</tr>
		<tr>
			<td>Surat Jalan</td>
			<td><input type="text" name="surat_jalan" class="form-control"  ></td>
		</tr>
		<tr>
			<td>Invoice</td>
			<td><input type="text" name="invoice" class="form-control"  ></td>
		</tr>
		
		<tr>
			<td>Suplier</td>
			<?php $cs=mysqli_fetch_array(mysqli_query($con,"select * from suplier where id_suplier='".$f['id_suplier']."'")) ;?>
			<td><input type="text" name="suplier" class="form-control" value="<?php echo $cs['nama']; ?>">
				
			
		</td>
	</tr>
	<tr>
		<td>Tanggal Transaksi</td>
		<td><input type="date" name="tgl_transaksi" class="form-control" value="<?php echo $f['tgl_transaksi']?>"></td>
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
	
	$querydetail=mysqli_query($con,'select * from transaksi_detail_masuk where id_transaksi_masuk="'.$f['id_transaksi'].'"');
	$i=0;
	while($data=mysqli_fetch_array($querydetail)) { 
		$i++;
		
		?>
		<td><input type="hidden" name="idtransaksidetail[]" value="<?php echo $data['id_transaksi_detail_masuk']?>"></td>
		<td><input type="hidden" name="id_barang[]" value="<?php echo $data['id_barang']; ?>"></td>
		<tr>

			<?php $cs=mysqli_fetch_array(mysqli_query($con,"select * from barang where id_barang='".$data['id_barang']."'"));?>
			<td><input type="text" name="nama_barang[]" class="form-control" value="<?php echo $cs['nama_barang']; ?>">			</td>
			<td><input type="text"  name="qty[]" class="form-control" value='<?php echo $data['qty'] ?>'></td>
			<td><input type="text" name="harga_beli[]" class="form-control" value='<?php echo $data['harga_beli'] ?>'></td>
			<td><input type="text" name="subtotal[]" class="form-control subtotal" value='<?php echo $data['subtotal'] ?>'></td>
		</tr>

	  <?php 
	    
	} ;?>
	<tr>
		<td>Total</td>
		<td><input type="text" id="tot" class="form-control" name="grand_total" value="<?php echo $f['grand_total']?>"></td>
	</tr>
	<tr>
		<td><input type="submit" name="edit" class="btn btn-success"></td>
	</tr>
</table>
<?php include('footer.php'); ?>