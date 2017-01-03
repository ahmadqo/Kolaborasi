<div>
<h1>Hasil Latihan</h1> <hr>
<?php 
       if(isset($_POST['submit'])){
			$tanggal=date("Y-m-d");
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					include "koneksi.php";
					$query=("select * from tabel_soal where id_soal='$nomor' and jawaban='$jawaban'");
					$hasil = mysqli_query($kon, $query);
					if(!$hasil){ echo mysql_error($kon);}
					$cek=mysqli_num_rows($hasil);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
				} 
				$score = $benar*20;
			}
		}
		?>
        <form action="?page=simpan" method="post">
		<table width="100%" border="0">
		<tr>
			<td width="12%">Jawaban Benar</font></td><td width="88%">= <?php echo $benar;?> soal x 20 point</font></td>
		</tr>
		<tr>
			<td>Jawaban Salah</font></td><td>= <?php echo $salah;?> soal </font></td>
		</tr>
		<tr>
			<td>Jawaban Kosong</font></td><td>= <?php echo $kosong;?> soal </font></td>
		</tr>
		<tr>
			<td><font color="red"><b>Score</b></font></td><td><font color="red">= <b><?php echo $score;?></b> Point</font></td>
		</tr>
		</table> 
        
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
        <p></p>
        </form> 
</div>
