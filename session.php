<?php 
session_start();
include('koneksi.php');
if (isset($_POST['login']) ? $_POST['login']:''){
	$username=isset($_POST['username']) ? $_POST['username']:'';
	$password=isset($_POST['password']) ? $_POST['password']:'';
	$convert=md5($password);
	if (empty($username)|| empty($password)) {
		echo ("<script type='text/javascript'>
			alert('isi data dengan lengkap');document.location='javascript:history.back(1)';</script>");
	}else{
		$query_check=mysql_query("select * from login where username='$username' and password='$convert'");
		$data=mysql_fetch_array($query_check);
		if ($username==$data['username'] && $convert==$data['password']) {
			$_SESSION['username']=$data['username'];
			$_SESSION['level']=$data['level'];
			$_SESSION['status']=$data['status'];
			header('location:home.php');
		}else{
			echo ("<script type='text/javascript'>
			alert('username dan password salah');document.location='javascript:history.back(1)';</script>");
		}
	}
}

 ?>