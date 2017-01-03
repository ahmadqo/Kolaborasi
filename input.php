<?php
  session_start();
  if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
		header("Location:http://localhost/PAW/login.html");
	}
?>
<html>
<html lang="en">
<head>
	<title>Latihan Online </title>
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
				<li><a href="materi1.php">Materi</a></li>
				<li><a href="inputArtikel.php">Artikel</a></li>
				<li><a href="input.php?page=soal">Input Soal</a></li>
				<li><a href="input.php?page=view">Edit Soal</a></li>
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

<div class="container materi">
	<div class="row">
		<div class="col-lg-12">
		<body onLoad="document.postform.elements['username'].focus();">
		<div id="outer">
			<div id="header">
				
			</div>
			
			<div id="body-middle" class="clearfix">
			
				<!-- Main Column -->
				<div id="main-col">
				
					<!-- Nameplate Box -->
					<div id="nameplate-top"></div>
					
					<div id="nameplate-bottom"></div>

					<!-- Main Content -->
					<div id="content-top"></div>
					<div id="content-wrapper">
						<div id="content">
						<?php 
							if(isset($_GET['page'])){
								$page=htmlentities($_GET['page']);
							}else{
								$page="soal";
							}
							
							$file="$page.php";
							$cek=strlen($page);
							
							if($cek>10 || !file_exists($file) || empty($page)){
								include ("soal.php");
							}else{
								include ($file);
							}
						?>		
                        </div>
					</div>
					<div id="content-bottom"></div>
					
				</div>
				<!-- End Main Column -->

				<!-- Sidebar Content -->
				<div id="side-col">

					<?php
					if(isset($_SESSION['id_user'])){
						include "status-login.php";
					}else{
						?>
						<!-- Side Box Begin -->
						<div class="side-box-top"></div>
						<div class="side-box-middle">
				
						<br />
						<br />
						</div>
						<div class="side-box-bottom"></div>
						<?php
					}
					?>
                    
                  <!-- Side Box End -->
				</div>
				<!-- End Sidebar Content -->
			</div>
			<div id="body-bottom"></div>

			<!-- Footer -->
			<div id="footer">

		  </div>
			
		</div>
   
	</div>
</div>
</body>
</html>


