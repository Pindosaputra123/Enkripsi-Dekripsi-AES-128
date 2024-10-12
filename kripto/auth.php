<?php
// Memulai sesi untuk menangani data pengguna yang login
session_start();

// Menyertakan file konfigurasi yang berisi koneksi ke database
include 'config.php';

// Mengecek apakah tombol login sudah ditekan
if (isset($_POST['login'])){

    // Memeriksa apakah input username atau password kosong
    if (empty($_POST['username']) || empty($_POST['password'])) {
        // Jika kosong, simpan pesan error
        $error = "Username or Password Tidak Valid!";
    
    } else {
        // Jika input tidak kosong, ambil nilai username dan password dari form
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        // Query ke database untuk mencari username dan password yang cocok dalam tabel users
        $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$username' AND password='$password'");
        
        // Mengecek jumlah baris yang ditemukan oleh query
        $cek = mysqli_num_rows($query);

        // Jika hasil query lebih dari 0, artinya ada data yang cocok
        if ($cek > 0) {
            // Menyimpan username dalam session
            $_SESSION['username'] = $username;
            // Menyimpan status login dalam session
            $_SESSION['status'] = $login;
            // Mengarahkan pengguna ke halaman dashboard jika login berhasil
            header("location: dashboard/index.php");
        
        // Jika tidak ada data yang cocok
        } else {
            // Mengarahkan pengguna kembali ke halaman login dengan pesan error
            header("location:index.php?pesan=gagal");
        }
    }
}
?>
