<?php 
session_start();
include('koneksi.php');

if (isset($_POST['submit'])) {

$sisa_bayar=$_POST['sisa_bayar'];
$pembayaran=$_POST['pembayaran'];

	if ($pembayaran>$sisa_bayar) {
		echo ("<script type='text/javascript'>
			alert('anda lebih bayar');document.location='javascript:history.back(1)';</script>");
		exit();
	}
	
	$query_bayar=mysql_query("update transaksi_masuk set bayar=bayar+'".$pembayaran."' where kode_transaksi='".$_POST['kode_transaksi']."'");

		if ($query_bayar) {
			$insert=mysql_query("INSERT into history_bayar(kode_transaksi,jumlah,tangal) VALUES ('".$_POST['kode_transaksi']."',
				'".$pembayaran."','".$_POST['tgl_pembayaran']."')");
			}
			header('location:view_transaksi_masuk.php');
		}else{
			echo mysql_error();
		}
		

		
	
include('header.php');

// $q=mysql_query("select * from transaksi_masuk where id_transaksi='".$_GET['idpr']."'");
// $f=mysql_fetch_array($q);


?>

<form method="post">
	<table border="1" class="table table-bordered">
		

		<tr>
			<td>Kode Transaksi</td>
			<td><select name="kode_transaksi" id="id_transaksi" class="form-control">
				<option value="">--Pilih kode Transaksi--</option>
				<?php $tm=mysql_query("select * from transaksi_masuk");
				while ($data=mysql_fetch_array($tm)) { ?>
				<option value="<?php echo $data['kode_transaksi'];?>"><?php echo $data['kode_transaksi'];?></option>
				<?php }?>
			</select>
				
		</tr>
		<tr>
			<td>No PO</td>
			<td><input type="text" name="no_po" id="no_po" class="form-control" readonly  ></td>
		</tr>
		<tr>
			<td>Surat Jalan</td>
			<td><input type="text" name="surat_jalan" class="form-control"  id="sj" readonly></td>
		</tr>
		<tr>
			<td>Invoice</td>
			<td><input type="text" name="invoice" class="form-control" id="invoice" readonly></td>
		</tr>
		
		<tr>
			<td>Suplier</td>
			<td><input type="text" name="suplier" class="form-control" id="suplier" readonly>
				
			
		</td>
	</tr>
	<tr>
		<td>Total Tagihan</td>
		<td><input type="text" name="total_tagihan" class="form-control" id="total_tagihan" readonly> </td>
	</tr>
	<tr>
		<td>Telah Bayar</td>
		<td><input type="text" name="telah_bayar" class="form-control"  id="telah_bayar" readonly></td>
	</tr>
	<tr>
		<td>Sisa Bayar</td>
		<td><input type="text" name="sisa_bayar" class="form-control"  id="sisa_bayar" readonly></td>
	</tr>
	<tr>
		<td>Pembayaran</td>
		<td><input type="text" name="pembayaran" class="form-control"  ></td>
	</tr>
	<tr>
		<td>Tanggal bayar</td>
		<td><input type="Date" name="tgl_pembayaran" class="form-control" ></td>
	</tr>
	<td><input type="submit" name="submit"></td>
	

	
</table>
<script >
	$(document).ready(function(){
		$("#id_transaksi").click(function(){
		 var id_transaksi = $("#id_transaksi").val();
		 $.ajax({
                            url: "get_transaksi_masuk.php",//
                            data: "id_transaksi=" + id_transaksi,
                            success: function (value) {
                                var data = value.split(",");
                                $("#no_po").val(data[0]);
                                $("#sj").val(data[1]);
                                $("#invoice").val(data[2]);
                                $("#suplier").val(data[3]);
                                $("#total_tagihan").val(data[4]);
                                $("#telah_bayar").val(data[5]);
                                $("#sisa_bayar").val(data[6]);
                            }
	});
		});
	});
</script>
<?php include('footer.php'); ?>