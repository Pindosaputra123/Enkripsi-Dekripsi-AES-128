<?php 
// Membuat koneksi ke database MySQL
// Parameter pertama adalah nama host (localhost), kedua adalah username MySQL (root), ketiga adalah password (kosong), dan keempat adalah nama database (kriptografi)
$koneksi = mysqli_connect("localhost","root","","kriptografi");

// Mengecek apakah koneksi berhasil atau tidak
if (mysqli_connect_errno()){
    // Jika terjadi kesalahan koneksi, tampilkan pesan error
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
