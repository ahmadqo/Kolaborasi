<div>
<?php
if(isset($_SESSION['user'])){

	$id=$_GET['id'];
	
	include "koneksi.php";
	$query=("delete from tabel_soal where id_soal='$id'");
	
	$hasil = mysqli_query($kon, $query);
		if(!$hasil){
			echo mysqli_error($kon);}
		else{
			?><script language="javascript">document.location.href="?page=view";</script><?php
		}

}else{
	?><p>Anda belum login. silahkan $login = "gagal";
		header("Location:http://localhost/PAW/login.html");</p><?php
}
?>
</div>
