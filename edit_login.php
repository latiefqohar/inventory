<?php 
include ('koneksi.php');

if (isset($_POST['edit'])) {
$cek_password=mysqli_query($con,"select * from login where id_login='".$_POST['id_login']."'");
$validasi=mysqli_fetch_array($cek_password);
$old_password=$validasi['password'];
$new_password=$_POST['password'];
if ($old_password==$new_password) {
	$password=$old_password;
}else{
	$password=md5($new_password);
}

$query_edit=mysqli_query($con,"update login set username='".$_POST['username']."',
	password='".$password."',
	level='".$_POST['level']."',
	status='".$_POST['status']."' where id_login='".$_POST['id_login']."'");

if ($query_edit) {
	header('location:view_login.php');
}else{
	echo mysqli_error();
}
}
$cari_data=mysqli_query($con,"select * from login where id_login='".$_GET['id_login']."'");
$hasil=mysqli_fetch_array($cari_data);
$hasilpass=$hasil['password'];

 ?>

 <form method="post" >
 	<td><input type="hidden" name="id_login" value="<?php echo $hasil['id_login'] ?>"></td>
 <table border="1" class="table table-bordered">

 	<tr>
 		<td>nama</td>
 		<td><input type="text" name="username" value="<?php echo $hasil['username'] ?>"></td>
 	</tr>
 	<tr>
 		<td>password</td>
 		<td><input type="password" name="password" value="<?php echo  $hasil['password'] ?>"></td>
 	</tr>
 	<tr>
 		<td>level</td>
 		<td><select name="level">
 			<option value="">--pilih level--</option>
 			<option value="admin">admin</option>
 			<option value="manager">manager</option>
 			<option value="supervisor">supervisor</option>
 		</select></td>
 	</tr>
 	<tr>
 		<td>status</td>
 		<td><select name="status" >
 			<option value="">--pilih level--</option>
 			<option value="0">tidak aktif</option>
 			<option value="1">aktif</option>
 		</select></td>
 	</tr>
 	<tr>
 		<td><input type="submit" value="save" name="edit"></td>
 	</tr>

 </table>
</form>