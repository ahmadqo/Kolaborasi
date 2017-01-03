<h1>Input Soal</h1> <hr>
<?php
  if(isset($_SESSION['user'])){
	$login = "sukses";
  }else{
	$login = "gagal";
		header("Location:http://localhost/PAW/login.html");
	}
	
	if (isset($_POST['submit'])){
		
		$pertanyaan=ucwords(htmlentities((trim($_POST['pertanyaan']))));
		$pilihan_a=ucwords(htmlentities((trim($_POST['pilihan_a']))));
		$pilihan_b=ucwords(htmlentities((trim($_POST['pilihan_b']))));
		$pilihan_c=ucwords(htmlentities((trim($_POST['pilihan_c']))));
		$pilihan_d=ucwords(htmlentities((trim($_POST['pilihan_d']))));
		
		$jawaban=ucwords(htmlentities((trim($_POST['jawaban']))));
		$publish=htmlentities((trim($_POST['publish'])));
		$tipe=htmlentities((trim($_POST['tipe'])));
		
		include "koneksi.php";
		$query=("INSERT INTO tabel_soal VALUES
		('','$pertanyaan','$pilihan_a','$pilihan_b','$pilihan_c','$pilihan_d','$jawaban','$publish','$tipe')");
		$hasil = mysqli_query($kon, $query);
		if($hasil){
?>
			<script language="javascript">document.location.href="?page=view";</script>
<?php
		}else{
			echo mysql_error($kon);
		}
		
	} else{
		unset($_POST['submit']);
	}
?>

    <h1></h1>
    
    <form action="?page=soal" method="post">
    <table class="datatable" align="left">
    <tr>
        <td width="29%" height="37" valign="top"><font size="2" face="verdana"><p>Pertanyaan</p></font></td>
        <td><textarea cols="23" rows="5" name="pertanyaan" required ></textarea></td>
    </tr>
    
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan A</p></font></td>
        <td><input type="text" name="pilihan_a" size="30" required /></td>
    </tr>
    
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan B</p></font></td>
        <td><input type="text" name="pilihan_b" size="30" required /></td>
    </tr>
    
     <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan C</p></font></td>
        <td><input type="text" name="pilihan_c" size="30" required /></td>
    </tr>
    
     <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Pilihan D</p></font></td>
        <td><input type="text" name="pilihan_d" size="30" required /></td>
    </tr>
    
     <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>JABAWAN</b></p></font></td>
        <td>
        <select name="jawaban">
        	<option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>
        </td>
    </tr>
    
    
    <tr>
        <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p><b>PUBLISH</b></p></font></td>
        <td>
        <select name="publish">
        	<option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
        </td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td width="71%"><input name="submit" type="submit" value="Submit" />&nbsp;</td>
    </tr>
    </table>
    </form>
</div>



    
