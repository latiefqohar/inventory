<?php 
include ('koneksi.php');
if(isset($_POST['simpan'])) {
$passwordmd5=md5($_POST['password']);
$query_input=mysql_query("insert into login (username, password, level, status) values('".$_POST['username']."',
'".$passwordmd5."',
'".$_POST['level']."',
'".$_POST['status']."')");

if ($query_input) {
	header("location:view_login.php");
}else{
	echo mysql_error();
 }
 }


 ?>

 <form method="post" >
 <table border="1" class="table table-bordered">

 	<tr>
 		<td>nama</td>
 		<td><input type="text" name="username" required></td>
 	</tr>
 	<tr>
 		<td>password</td>
 		<td><input type="password" name="password" required></td>
 	</tr>
 	<tr>
 		<td>level</td>
 		<td><select name="level" >
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
 		<td><input type="submit" value="save" name="simpan"></td>
 	</tr>

 </table>
</form>