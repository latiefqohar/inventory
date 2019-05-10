<?php 
include ('koneksi.php');
IF(isset($_POST['save'])){
$query_insert="insert into customer(nama,alamat,no_hp,status)values(
'".$_POST['fnama']."',
'".$_POST['falamat']."',
'".$_POST['fnohp']."',
'".$_POST['fstatus']."')";
$proses=mysqli_query($con,$query_insert);

if($proses){
	header('location:view_customer.php');
}else
echo mysqli_error();
}

 ?>
 <form method="post">
 <table>
 	<tr>
 		<td>nama</td>
 		<td><input type="text" name="fnama"></td>
 	</tr>
 	<tr>
 		<td>alamat</td>
 		<td><input type="text" name="falamat"></td>
 	</tr>
 	<tr>
 		<td>nohp</td>
 		<td><input type="text" name="fnohp"></td>
 	</tr>
 	<tr>
 		<td>status</td>
 		<td><input type="text" name="fstatus"></td>
 	</tr>
	<td><input type="submit" name="save"></td>
 </table>
 </form>