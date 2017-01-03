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
	    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="img/akakom6.jpg" alt="Image">  
			<div class="carousel-caption">
				<img src="img/coba.jpg" class="img-circle" alt="Cinque Terre" width="304" height="236">
				<h1>TUGAS PENGEMBANGAN APLIKASI WEB KELOMPOK 8</h1>
			</div> 			
		</div>

		<div class="item">
			<img src="img/akakom6.jpg" alt="Image">
			<div class="carousel-caption">
			<img src="img/akakom7.jpg" class="img-rounded" alt="Cinque Terre" width="200" height="230">
				<h3>Sekolah Tinggi Manajemen Infromatika dan Komputer</h3>
				<h1>AKAKOM</h1>
				<h3>Yogyakarta</h3>
			</div>      
		</div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
    </a>
	<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
    </a>
</div>

<footer class="container-fluid text-center">
  <p></p>
</footer>

</body>
</html>
