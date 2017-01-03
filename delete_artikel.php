<?php
error_reporting(E_ALL ^ E_DEPRECATED);
	include "koneksi.php";
	$judul = $_GET['judul'];

	$sql = "delete from artikel where judul='$judul'";
	mysqli_query($kon, $sql) or die("Gagal hapus file");

	include_once "artikel.php"
?>