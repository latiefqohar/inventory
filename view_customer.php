<?php
session_start();
include('koneksi.php');
include('header.php');
$query_view=mysql_query("select * from customer");
?>
<table border="1" class="table table-bordered">
	<tr>
		<th>no</th>
		<th>nama</th>
		<th>alamat</th>
		<th>no hp</th>
		<th>status</th>
		<th colspan="2">action</th>

	</tr>
	<?php
	$no=1;
	while ($data=mysql_fetch_array($query_view)) {?>
	<tr>
		<td><?php echo $no++;?></td>
		<td><?php echo $data['nama'];?></td>
		<td><?php echo $data['alamat'];?></td>
		<td><?php echo $data['no_hp'];?></td>
		<td><?php echo $data['status'] ?></td>
		<td><a href="edit_customer.php?id-customer=<?php echo $data['id_customer'];?>">edit</a></td>
		<td><a href="delete_customer.php?id-customer=<?php echo $data['id_customer'];?>">delete</a></td>

	</tr>
	<?php
	}
	?>
</table>	
<?php 
include ('footer.php');
 ?>