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
  
<div class="container text-center kontener">
	<div class="row">
		<div class="col=lg-12">
		<h3>Profil Kelompok-8</h3><br>
				<div class="col-sm-4"> 
				<a href="tria1.php" title='Profil Shinta'>
				<img src="pict/tria.jpg" class="img-responsive" style="width:100%" alt="Image"></a>   
			</div>
			<div class="col-sm-4">
				<a href="shinta1.php" title='Profil Shinta'>
				<img src="pict/shinta.jpg" class="img-responsive" style="width:100%" alt="Image"> </a>
			</div>
			<div class="col-sm-4"> 
				<a href="ahmad1.php" title='Profil Ahmad'>
				<img src="pict/ahmad.jpg" class="img-responsive" style="width:100%" alt="Image"> </a>
				<p></p>    
			</div>
			<br/>
			<div class="col-sm-4">
				<a href="nidya1.php" title='Profil Shinta'>
				<img src="pict/nidya.jpg" class="img-responsive" style="width:100%" alt="Image"></a>
			</div>
			<div class="col-sm-4"> 
				<a href="oni1.php" title='Profil Shinta'>
				<img src="pict/oni.jpg" class="img-responsive" style="width:100%" alt="Image"></a>    
			</div>
		</div>
	</div>
</div>
</body>
</html>
