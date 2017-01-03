<?php
  session_start();
  if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profil : Oni / 155410101</title>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
    body {
	  background-image:url(pict/bgblur.JPG);
	}
	.navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
	}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="profil.php">Profil</a></li>
				<?php
					if($login == "sukses"){
						echo "<li><a href='materi1.php'>Materi</a></li>";
						echo "<li><a href='inputArtikel.php'>Artikel</a></li>";
						echo "<li><a href='input.php?page=soal'>Input Soal</a></li>";
						echo "<li><a href='input.php?page=view'>Edit Soal</a></li>";
					}
					else {
						echo "<li><a href='download.php'>Download</a></li>";
						echo "<li><a href='artikel.php'>Artikel</a></li>";
						echo "<li><a href='home.php?page=ujian'>Latihan Soal</a></li>"; }
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><span class="glyphicon glyphicon-log-in"></span> 
				<?php
				if($login == "sukses"){
					echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>";
				}else{
					echo "<li><a href='login.html'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
				}
				?>
			</ul>
		</div>
	</div>
</nav>
  
<div class="container text-center">    
	<div class="table-responsive">
	<h2>Profil Oni Harnantyo</h2>
		<table class="table" border="0" >
		<tr>
			<td align=left>Nama</td>
			<td>:</td>
			<td align=left>Oni Harnantyo</td>
			<td rowspan='6'> <img src="pict/fto.jpg"> </td>
		<tr>
		<tr>
			<td align=left>NIM</td>
			<td>:</td>
			<td align=left>155410101</td>
		</tr>
		<tr>
			<td align=left>Jurusan</td>
			<td>:</td>
			<td align=left>Teknik Informatika</td>
		</tr>
		<tr>
			<td align=left>Angkatan</td>
			<td>:</td>
			<td align=left>2015</td>
		</tr>
		<tr>
			<td align=left>Alamat</td>
			<td>:</td>
			<td align=left>Jl. Kenari, Gg. Tanjung No. 231</td>
		</tr>
		</table>

	</div> 
</div><br>
</body>
</html>
