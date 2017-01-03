<?php
  session_start();
  if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
	}
?>

<html>
<html lang="en">
<head>
	<title>Web Profil Kelompok 8</title>
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
  .materi{
	margin-top:25;
	}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="profil.php">Porfil</a></li>
				<li><a href="download.php">Download</a></li>
				<?php
					if($login == "sukses"){
						echo "<li><a href='materi1.php'>Materi</a></li>";
						echo "<li><a href='inputArtikel.php'>Artikel</a></li>";
						echo "<li><a href='input.php?page=soal'>Input Soal</a></li>";
						echo "<li><a href='input.php?page=view'>Edit Soal</a></li>";
					}
					else {
						echo "<li><a href='artikel.php'>Artikel</a></li>";
						echo "<li><a href='home.php?page=ujian'>Latihan Soal</a></li>"; }
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
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

<div class="container materi">
	<div class="row">
		<div class="col-lg-12">
		<div class="table-responsive"> 
		<center><h2> Download Materi </h2></center><br/>
		  <table class="table">
			<tr>
			<th>Nama File</th>
			<th>Author</th>
			<th>Download</th>
			</tr>
			<?php
				include "koneksi.php";
				$sql="select * from file";
				$hasil = mysqli_query($kon, $sql);
				
				while($row = mysqli_fetch_assoc($hasil)){
					echo "<tr>";
					echo "<td>".$row['nama_file']."</td>";
					echo "<td>".$row['author']."</td>";
					echo "<td><a href =uploads/".$row['nama_file']." >".$row['nama_file']."</a></td>";
					echo "</tr>";
				}
			?>
		  </table>
		</div>
		</div>
	</div>
</div>
</body>
</html>


