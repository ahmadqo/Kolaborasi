<div>
<?php
if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
		header("Location:http://localhost/PAW/login.html");}
	
?>
        <h1>Edit Soal</h1> <hr>
<?php
		include "koneksi.php";
		$query=("select * from tabel_soal order by tipe asc");
		$hasil = mysqli_query($kon, $query);
		if(!$hasil){
			echo mysql_error($kon);
		}
?>
		<table width="100%">
<?php
		$no=0;
		while($row=mysqli_fetch_array($hasil)){
?>
			<tr>
           		<td><font color="black"><?php echo $no=$no+1;?>.</font></td><td><font color="#191970"><?php echo $row['pertanyaan'];?></font></td>
            </tr>
            <tr>
           		<td></td><td><font color="black">A) <?php echo $row['pilihan_a'];?></font></td>
            </tr>
            <tr>
           		<td></td><td><font color="black">B) <?php echo $row['pilihan_b'];?></font></td>
            </tr>
            <tr>
           		<td></td><td><font color="black">C) <?php echo $row['pilihan_c'];?></font></td>
            </tr>
            <tr>
           		<td></td><td><font color="black">D) <?php echo $row['pilihan_d'];?></font></td>
            </tr>
            <tr>
           		<td></td><td><font color="red">JAWABAN : <b><?php echo $row['jawaban'];?></b> |  PUBLISH : <b><?php echo ucwords($row['publish']);?></b> &raquo;
                </font>
                <a href="?page=edit&id=<?php echo $row['id_soal']?>" title="Edit">Edit</a> <a href="?page=delete&id=<?php echo $row['id_soal']?>" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus pertanyaan ini ?')">Hapus</a>
                </td>
            </tr>
            <tr>
           		<td colspan="2"><br /></td>
            </tr>
		<?php
		}
		?>
        </table>
        </p>
</div>
