<?php
  session_start();
  if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
	}
?>
<script type="text/javascript" language="JavaScript">
		function konfirmasi(){
			tanya = confirm("Anda Yakin Akan Menghapus Data ?");
			if (tanya == true) return true;
			else return false;
		}
</script>
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
						echo "<li><a href='inputArtikel.php'>Artikel</a></li>";
						echo "<li><a href='input.php?page=soal'>Input Soal</a></li>";
						echo "<li><a href='input.php?page=view'>Edit Soal</a></li>";
					}
					else {
						echo "<li><a href='download.php'>Download</a></li>";
						echo "<li><a href='inputArtikel.php'>Artikel</a></li>";
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
	<table width="600" border="0" align="center">
	<?php
		$kode_artikel = $_GET['id_ar'];
		include "koneksi.php";
		$query = "SELECT id_ar AS id_ar, judul, isi, penulis "." FROM artikel WHERE id_ar='$kode_artikel' ";
		$hasil = mysqli_query($kon, $query);
		if(!$hasil){
			echo mysqli_error($kon);
		}
		
		while ($baris = mysqli_fetch_row($hasil)) {
			echo("<tr>");
			echo ("<td><br/> <h2>$baris[1]</h2></td>");
			echo("</tr>");
			echo("<tr>");
			echo("<td  align='justify'>$baris[2]</td>");
			echo("</tr>");
			echo("<tr>");
			echo("<td><b><center>Penulis : $baris[3]</b></center></td>");
			echo("<tr>");
			if($login=="sukses"){
				echo "<td><a onclick='return konfirmasi()' href=delete_artikel.php?judul=".$baris['1'].">Hapus</a> &nbsp;
				<a href=edit_artikel.php?judul=".$baris['1'].">Edit</a></td>";
				echo("</tr>"); 
			}
						echo("<tr>");
			echo ("<td><br/></td>"); echo("</tr>");
			}
	?>
</table>
</body>
</html>