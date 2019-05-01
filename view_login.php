
<?php 
session_start();
include ('koneksi.php');
include ('header.php');

$query_view="select * from login";
$proses=mysql_query($query_view);
 ?>

 <table class="table table-bordered">
 	<tr>
 		<td>username</td>
 		<td>password</td>
 		<td>level</td>
 		<td>status</td>
 		<td colspan="2">action</td>
 	</tr>
 	<?php 
 	while ($tampil_data=mysql_fetch_array($proses))
 	{?>
 	<tr>
	
 		<td><?php echo $tampil_data['username']; ?></td>
 		<td><?php echo $tampil_data['password']; ?></td>
 		<td><?php echo $tampil_data['level']; ?></td>
 		<td><?php echo $tampil_data['status']? 'Aktif' : 'Tidak Aktif' ?></td>
 		<?php if ($_SESSION['level']=='admin') {?>
			<td><a href="edit_login.php?id_login=<?php echo $tampil_data['id_login'];?>">edit</a></td>
	 		<td><a href="delete_login.php?id_loginhapus=<?php echo $tampil_data['id_login'];?>">hapus</a></td>
	 	<?php }else{ ?>
 			<td><a href="edit_login.php?id_login=<?php echo $tampil_data['id_login'];?>">edit</a></td>
 		<?php } ?>
		
 	</tr>
 <?php } ?>
 </table>
 <?php include ('footer.php'); ?>