
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$author = $_POST['author']; //bisa dibaca via session
$target_dir = "uploads/";
$target_file = $target_dir . str_replace(" ","",basename($_FILES["fileToUpload"]["name"]));
$nama_file = $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$tipeYangBoleh = array("doc", "docx","pdf","pptx");
 if(!is_dir($target_dir)){ 
	mkdir($target_dir);
}

if(!in_array($FileType, $tipeYangBoleh)){
	$uploadOk = 0;
	echo "Tipe file tidak dikenal.";	
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

include "koneksi.php";

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$sql = "insert into file(nama_file, author) values('".str_replace(" ","",$nama_file)."','".$author."')";
	mysqli_query($kon, $sql) or die("gagal insert file");
	
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
include "materi1.php";
?>
