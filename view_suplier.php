<?php 
include('koneksi.php');
$query_view=mysqli_query($con,"select * from suplier");

 ?>
 <table border="1">
 	<tr>
 		<td>no</td>
 		<td>nama</td>
 		<td>alamat</td>
 		<td>no telpon</td>
 	</tr>
 	<?php 
 	$no=1;
 	while ($data=mysqli_fetch_array($query_view)) { ?>
 	<tr>
 		<td><?php echo $no++; ?></td>
 		<td><?php echo $data['nama'] ?></td>
 		<td><?php echo $data['alamat'] ?></td>
 		<td><?php echo $data['no_telpon'] ?></td>
 	</tr>
 <?php } ?>
 </table>