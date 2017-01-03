<?php
include "koneksi.php";
$judul = $_GET['judul'];
$queri = "select * from artikel where judul='$judul'";
$hasil = mysqli_query($kon, $queri);
$data  = mysqli_fetch_assoc($hasil);

$judul_edit = $data['judul'];
$isi_edit = $data['isi'];
$penulis_edit = $data['penulis'];
?>
<?php
	session_start();
	if(isset($_SESSION['user'])){
		$login = "sukses";
	}else{
	$login = "gagal";
		header("Location:http://localhost/PAW/login.html");
	}
	
	if (isset($_POST['submit'])){
		
		$judul = $_POST["judul"];
		$isi = $_POST["isi"];
		$penulis = $_POST["penulis"];
		
		include "koneksi.php";
		$query="update artikel(judul,isi,penulis) VALUES('$judul','$isi','$penulis')";
		$hasil = mysqli_query($kon, $query);
		if($hasil){
?>
			<script language="javascript">document.location.href="artikel.php";</script>
<?php
		}else{
			echo mysqli_error($kon);
		}
		
	} else{
		unset($_POST['submit']);
	}
?>
<html lang="en">
<head>
<title>Artikel Detail</title>
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
						echo "<li><a href='artikel.php'>Artikel</a></li>";
						echo "<li><a href='input.php?page=soal'>Input Soal</a></li>";
						echo "<li><a href='input.php?page=view'>Edit Soal</a></li>";
					}
					else {
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
<div class="container">
	<div class="row">
		<div class="col-md-3 col-lg-6 col-md-offset-3">
			<h1><center>Input Artikel</center></h1> <hr>
			<form action="?page=inputArtikel" method="post">
			<div class="form-group">
                	<label for="name">Judul</label>
                	<input name="judul" value="<?php echo $judul_edit;?>" type="text" class="form-control" required>
            </div>
			 <div class="form-group">
                	<label for="name">Judul</label>
                	<textarea class="form-control" name="isi" value="<?php echo $isi_edit;?>" rows="10" required></textarea>
            </div>
			<div class="form-group">
                	<label for="name">Penulis</label>
                	<input name="penulis" value="<?php echo $penulis_edit;?>" type="text" class="form-control" required>
            </div>
			<input type="submit" value="Save" name="submit" class="btn btn-primary">
			</form>
		</div>
	</div>
</div>
</body>
</html>