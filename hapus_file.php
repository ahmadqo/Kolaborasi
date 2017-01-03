<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	include "koneksi.php";
	$kode = $_GET['kode'];
	$nama_file = "uploads/".$_GET['nama_file'];
	
	$sql = "delete from file where kode=$kode";
	mysqli_query($kon, $sql) or die("Gagal hapus file");
	unlink($nama_file);
	include_once "materi1.php"
?>