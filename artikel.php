<?php
	session_start();
	if(isset($_SESSION['user'])){
		$login = "sukses";
	}else{
		$login = "gagal";
	}	
	if (isset($_POST['submit'])){
		
		$judul = $_POST["judul"];
		$isi = $_POST["isi"];
		$penulis = $_POST["penulis"];
		
		include "koneksi.php";
		$query=("INSERT INTO artikel VALUES
		('','$judul','$isi','$penulis')");
		$hasil = mysqli_query($kon, $query);
		if($hasil){
?>
			<script language="javascript">document.location.href="artikel.php";</script>
<?php
		}else{
			echo mysql_error($kon);
		}
		
	} else{
		unset($_POST['submit']);
	}
?>
<html lang="en">
<head>
<title>Artikel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	body {
	  background-image:url(pict/bgblur.JPG);
	}
	    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none;
		
    }
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
<table width="900" border="0" align="center">
<?php
	
	include "koneksi.php";
	$query = "SELECT * FROM artikel";
	$hasil = mysqli_query($kon, $query);
		if(!$hasil){
			echo mysql_error($kon);
		}
		
	$no=0;
		while($baris=mysqli_fetch_array($hasil)){
	echo("<tr>");
	echo("<td><br><h1> $baris[1] </h1></td>");
	echo("</tr>");
	echo("<tr>");
	echo("<td colspan='2' align='justify'>".substr($baris[2],0,150)." <a href='artikel_detail.php?id_ar=$baris[0]'>Read More . . .</a> </td>");
	echo("</tr>");
	echo("<tr>");
	echo("<td>Penulis : $baris[3]<hr></td>");
	echo("</tr>");  }
	
?>
</table>
</body>
</html>