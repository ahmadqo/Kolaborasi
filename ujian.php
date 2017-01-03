<div>
    <h1>Latihan Soal</h1><hr>
    <p>
	<?php
		include "koneksi.php";
		$query=("select * from tabel_soal where publish='yes'");
		$hasil = mysqli_query($kon, $query);
		if(!$hasil){
			echo mysql_error($kon);
		}
		$jumlah=mysqli_num_rows($hasil);
		$urut=0;
		while($row =mysqli_fetch_array($hasil))
		{
			$id=$row["id_soal"];
			$pertanyaan=$row["pertanyaan"];
			$pilihan_a=$row["pilihan_a"];
			$pilihan_b=$row["pilihan_b"];
			$pilihan_c=$row["pilihan_c"];
			$pilihan_d=$row["pilihan_d"]; 
			
			?>
			<form name="form1" method="post" action="?page=jawaban">
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			<table width="900" border="0">
			<tr>
			  	<td><font color="black"><?php echo $urut=$urut+1; ?></font></td>
			  	<td width="880"><font color="black"><?php echo "$pertanyaan"; ?></font></td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="A"> <font color="black"><?php echo "$pilihan_a";?></font> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="B"> <font color="black"><?php echo "$pilihan_b";?></font> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="C"> <font color="black"><?php echo "$pilihan_c";?></font> </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="D"> <font color="black"><?php echo "$pilihan_d";?> <br/><br/></font> </td>
            </tr>
			</table>
		<?php
		}
		?>
        	<tr>
				<td>&nbsp;</td>
			  	<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>
		</form>
        </p>
</div>
