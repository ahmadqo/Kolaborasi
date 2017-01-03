<?php
	$host = "localhost";
	$user = "root";
	$pass ="";
	$db_name = "profil";
	
	$kon = mysqli_connect($host, $user, $pass) or die("gagal koneksi");
	mysqli_query($kon, "create database if not exists $db_name");
	mysqli_select_db($kon,$db_name);
	
	
	$TableLogin = "create table if not exists login(
					user varchar(50) not null primary key,
					password varchar(50) not null,
					nama_lengkap varchar(50) not null,
					akses varchar(20) not null
					)";
	mysqli_query($kon, $TableLogin) or die("Gagal Buat Table Login");
	
	$TableFile = "create table if not exists file(
		kode int(5) auto_increment primary key,
		author varchar(20),
		nama_file varchar(30))";
	mysqli_query($kon, $TableFile) or die("Gagal buat tabel File");
	
	$TableArtikel = "create table  if not exists artikel (
					id_artikel int not null primary key auto_increment,
					judul_artikel varchar(100),
					isi_artikel text,
					penulis_artikel varchar(250),
					photo_artikel varchar(250),
					tgl_artikel timestamp)";
	mysqli_query($kon, $TableFile) or die("Gagal buat tabel Artikel");
	
	$TableArtikel = "create table if not exists artikel(
		id_ar int(5) auto_increment primary key,
		judul varchar(50),
		isi varchar(1000),
		penulis varchar(50)
		)";
	mysqli_query($kon, $TableArtikel) or die("Gagal buat tabel File");
?>