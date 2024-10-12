<?php
include "../config.php";   //memasukan koneksi
include "AES.php"; //memasukan file AES


if (isset($_POST['tes_entropy'])){

	$idfile    = ($_POST['fileid']);
	$query1     = "SELECT * FROM file WHERE id_file='$idfile'";
	$sql1       = mysqli_query($koneksi,$query1);
	$data       = mysqli_fetch_assoc($sql1);

	
	$url        = $data["file_name_finish"];
	$file_path  = "file_encrypt/$url";
	
	$handle = fopen($file_path, "rb");
	// Initialise our character count array
	$chars = array();

	// membaca file dan mengubah ASCII pertama
	$charcount = 0;
	
	while ($thischar = fread($handle, 1)) {
		if (!isset($chars[ord($thischar)])) {
			$chars[ord($thischar)] = 0;
		}
		$chars[ord($thischar)]++;
		$charcount++;
	}

	// menghitung entropy
	$entropy = 0.0;
	foreach ($chars as $val) {
		$p = $val / $charcount;
		$entropy = $entropy - ($p * log($p,2));
	}
	fclose($handle);

	$sql2   = "UPDATE file SET tes_en ='$entropy' WHERE id_file = '$idfile'";
    $query2  = mysqli_query($koneksi,$sql2) or die(mysql_error());
    
	$a=$data["id_file"];
	echo("<script language='javascript'>
	window.location.href='entropyhalaman.php?id_file=$a';
    window.alert('Persentase tes entropy enkripsi file $url adalah $entropy');
    </script>");
    
	}
?>