<?php 
include ('koneksi.php');
if (isset($_POST['cari'])){
$query_edit="update customer set nama='".$_POST['nama']."',
 alamat='".$_POST['alamat']."',
 no_hp='".$_POST['nohp']."',
 status='".$_POST['status']."'
 where id_customer='".$_POST['id']."'";
 $proses=mysql_query($query_edit);

  if ($proses) {
 	header('location:view_customer.php');
 }else{
 		echo mysql_error();
 } 
 }

$select_data=mysql_query("select * from customer where id_customer='".$_GET['id-customer']."'");
$data=mysql_fetch_array($select_data);
 ?>
 <form method="post">
 	<table>
 		<td>
 		<input type="hidden" value="<?php echo $data['id_customer']?>" name="id">
 		</td>
 		<tr>
 			<td>nama barang</td>
 			<td><input type="text" value="<?php echo $data['nama'];?>" name="nama"></td>
 		</tr>
 		<tr>
 			<td>alamat</td>
 			<td><input type="text" value="<?php echo $data['alamat'];?>" name="alamat"></td>
 		</tr>
 		<tr>
 			<td>no hp</td>
 			<td><input type="text" value="<?php echo $data['no_hp'];?>" name="nohp"></td>
 		</tr>
 		<tr>
 			<td>status</td>
 			<td><input type="text" value="<?php echo $data['status'];?>" name="status"></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td><input type="submit" name="cari"></td>
 		</tr>
 	</table>
 </form>