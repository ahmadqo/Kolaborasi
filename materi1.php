<?php
  session_start();
  if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
		header("Location:http://localhost/PAW/login.html");
	}
	$author = $_SESSION['nama_lengkap'];
?>
<script type="text/javascript" language="JavaScript">
		function konfirmasi(){
			tanya = confirm("Anda Yakin Akan Menghapus Data ?");
			if (tanya == true) return true;
			else return false;
		}
</script>
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
				<li><a href="profil.php">Profil</a></li>
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
		<center> 
		<form action="upload.php" method="post" enctype="multipart/form-data">
		<table border="0">
			<tr>
				<td>
					Author &nbsp;&nbsp;
				</td>
				<td>
					<input type="text" name="author" value="<?php echo $author; ?>" readonly/>&nbsp;&nbsp;
				</td>
				<td>
					pilih file (doc, docx, pdf, pptx)
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td colspan="2s">
					<input type="file" name="fileToUpload" id="fileToUpload">
				</td>
			</tr>
			<tr><td><br/> </td></tr>
			<tr> <td><br/></td>
				<td >
					<input type="submit" value="Upload" name="submit" class="btn btn-default">
				</td>
			</tr>
		</table>
		</form>
		</center>

		<div class="table-responsive"> 
		  <table class="table">
			<tr>
			<th>Nama File</th>
			<th>Author</th>
			<th>Download</th>
			<th>Proses</th>
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
					echo "<td><a onclick='return konfirmasi()' href=hapus_file.php?kode=".$row['kode']."&nama_file=".$row['nama_file'].">Hapus</a></td>";
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


