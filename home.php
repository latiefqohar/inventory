
<?php 
session_start();
if ($_SESSION['status']=='1') {

include ('header.php');
 ?>
<?php 
}else {
	echo ("<script type='text/javascript'>
	alert('user anda tidak aktif');document.location='javascript:history.back(1)';</script>");
}
include ('body.php');
include ('footer.php');
 ?>
