<?php
	session_start();
	$pengguna = $_POST['user'];
	$kata_kunci = md5 ($_POST['pass']);
	$gagal = "wrong";
		
	include "koneksi.php";
	$sql = "SELECT * FROM login WHERE user = '".$pengguna."' and 
              password='".$kata_kunci."' limit 1";
	$hasil = mysqli_query($kon, $sql) or die ('Gagal Akses! <br/>');
	$jumlah = mysqli_num_rows($hasil);
	if ($jumlah > 0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["user"] = $row["user"];
		$_SESSION["nama_lengkap"] = $row["nama_lengkap"];
		$_SESSION["akses"] = $row["akses"];
		header("Location:index.php");}
	else {
		header("location:login.html?error=$gagal");
	}
?>
