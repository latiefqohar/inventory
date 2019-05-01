<?php 
session_start();
include('koneksi.php');
if (isset($_POST['save'])) {
$queryheader=mysql_query("insert into transaksi_keluar(id_customer, kode_transaksi, tanggal_transaksi) value ('".$_POST['id_customer']."',
'".$_POST['kode_transaksi']."',
'".$_POST['tgl_transaksi']."')");
$id_transaksi=mysql_insert_id();
if ($queryheader) {
	$data_barang=$_POST['id_barang'];
	$data_qty=$_POST['qty'];
	$data_harga_jual=$_POST['harga_jual'];
	$data_subtotal=$_POST['subtotal'];
	$grand_total=0;
	$total_qty=0;
	for ($i=0; $i < count($data_barang); $i++) { 
		if ($data_barang[$i]!='') {
			$barang=$data_barang[$i];
			$qty=$data_qty[$i];
			$harga_jual=$data_harga_jual[$i];
			$harga_subtotal=$qty*$harga_jual;
			$query_detail=mysql_query("insert into transaksi_detail_keluar(id_transaksi_keluar, id_barang, qty, harga_jual, subtotal) 
				values('$id_transaksi','$barang','$qty','$harga_jual','$harga_subtotal')");
			$total_qty+=$qty;
			$grand_total+=$harga_subtotal;

			$b=mysql_query("update barang SET qty=qty-".$qty." where id_barang='".$barang."'");
			if ($query_detail) {
				echo "ok";
			}else{
				echo mysql_error();
			}
		}
	}
	$a=mysql_query("update transaksi_keluar SET qty_total='".$total_qty."', grand_total='".$grand_total."' where id_transaksi_keluar='".$id_transaksi."'");
	
}else{
	ECHO mysql_error();
}
}
 ?>
<?php include ('header.php'); ?>
 <form action="" method="post">
 	<table border="1" class="table table-bordered">
 		<tr>
 			<td>kode transaksi</td>
 			<td><input type="text" name="kode_transaksi"></td>
 		</tr>
 		<tr>
 			<td>Customer</td>
 			<td><select name="id_customer" id="">
 				<option value="">--pilih customer--</option>
 			<?php $cs=mysql_query("select * from customer");
 			while ($data=mysql_fetch_array($cs)) {?>
 				<option value="<?php echo $data['id_customer'];?>"><?php echo $data['nama'];?></option>
 			<?php }  ?>
 			 </select></td>
 		</tr>
 		<tr>
 			<td>Tanggal Transaksi</td>
 			<td><input type="date" name="tgl_transaksi"></td>
 		</tr>
 	</table>

 	<br>
 	<table border="1" class="table table-bordered">
 		<tr>
 			<td>Nama Barang</td>
 			<td>Qty</td>
 			<td>Harga Jual</td>
 			<td>Sub Total</td>
 		</tr>
 		<?php for ($i=1; $i <=6 ; $i++) {
 		 ?>
 		<tr>
 			<td><select name="id_barang[]" id='id_barang_<?php echo $i ?>'>
 				<option value="">--pilih barang--</option>
 				<?php $cs=mysql_query("select * from barang");
 				while ($data=mysql_fetch_array($cs)) {?>
 				 <option value="<?php echo $data['id_barang']; ?>"><?php echo $data['nama_barang']; ?></option>	
 				<?php } ?>
 			</select></td>
 			<td><input type="text" name="qty[]" id='qty_<?php echo $i ?>'></td>
 			<td><input type="text" name="harga_jual[]" id='harga_<?php echo $i ?>'></td>
 			<td><input type="text" name="subtotal[]" id='subtotal_<?php echo $i ?>'></td>
 		</tr>
 		<script>
 			$(document).ready(function(e){
 				$("#id_barang_php<?php echo $i; ?>").click(function(){
 					var id_barang = $("#id_barang_<?php echo $i; ?>").val();
 					$ajax({
 						url: "get_barang.php",
 						data: "id_barang=" + id_barang,
 						success: function(value){
 							var data=value.split(",");
 							$("#harga_<?php echo $i;?>").val(data[0]);
 							var price = Number($("#harga_<?php echo $i;?>").val(data[0]));
 							var qty = Number($("#qty_<?php echo $i;?>").val(data[0]));
 							var sub = Number(price)*qty;
 							$("#subtotal_<?php echo $i;?>").val(sub);
 							sumAll;
 						}
 					})
 				})
 			})
 		</script>
		<?php } ?>
 		
 	</table>
 	<tr>
 		<input type="submit" name="save">
 	</tr>
 	

 </form>
 <?php include ('footer.php'); ?>