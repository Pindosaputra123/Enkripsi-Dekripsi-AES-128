<!DOCTYPE html>
<html>
  <!-- Deklarasi tipe dokumen sebagai HTML5 -->
  <head>
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
    <title>Aplikasi Enkripsi dan Dekripsi AES-128</title>
    <!-- Set karakter encoding ke UTF-8 untuk mendukung berbagai karakter -->
    <meta charset="utf-8">
    <!-- Memastikan kompatibilitas dengan Internet Explorer versi lama -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memastikan tampilan halaman sesuai dengan ukuran layar perangkat (responsive) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link ke file CSS eksternal untuk styling halaman -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Shim dan Respond.js untuk mendukung elemen HTML5 dan media queries pada IE8 -->
    <!-- Jika versi IE kurang dari 9, maka gunakan shim dan respond.js -->
    <!-- HTML5 Shim dan Respond.js untuk mendukung elemen dan media queries pada IE8 -->
    <!-- if lt IE 9 -->
    <!-- Menambahkan HTML5 Shiv untuk mendukung elemen HTML5 -->
    <!-- script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') -->
    <!-- Menambahkan Respond.js untuk mendukung media queries -->
    <!-- script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') -->
  </head>
  <body>
    <!-- Bagian background di atas layar -->
    <section class="material-half-bg">
      <!-- Menambahkan cover dengan warna background gelap -->
      <div class="cover" style="background-color:#2F4F4F;"></div>
    </section>

    <!-- Konten utama untuk bagian login -->
    <section class="login-content info">
      <!-- Logo dan judul -->
      <div class="logo" style="font-family:Times new roman">
        <!-- Judul halaman ditampilkan dalam heading 1 -->
        <h1>KELOMPOK 8</h1>
      </div>
	  
	  <!-- PHP untuk menangani pesan login -->
	  <?php 
	  // Mengecek apakah ada variabel 'pesan' yang dikirim melalui URL
	  if(isset($_GET['pesan'])){
		// Jika nilai pesan adalah 'gagal', tampilkan pesan gagal login
		if($_GET['pesan'] == "gagal"){
			echo "Akses masuk gagal! username dan password salah!";
		// Jika nilai pesan adalah 'logout', tampilkan pesan berhasil logout
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil keluar";
		// Jika nilai pesan adalah 'belum_login', tampilkan pesan bahwa pengguna harus login terlebih dahulu
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus masuk untuk mengakses halaman admin";
		}
	  }
	  ?>
	  
      <!-- Kotak untuk form login -->
      <div class="login-box">
        <!-- Form login yang akan dikirim ke auth.php dengan metode POST -->
        <form class="login-form" action="auth.php" method="post">
          <!-- Heading form login dengan ikon user -->
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
          <!-- Grup input untuk username -->
          <div class="form-group">
            <!-- Label untuk input username -->
            <label class="control-label">Username</label>
            <!-- Input untuk username, dengan autofocus dan autocomplete dimatikan -->
            <input class="form-control" type="text" name="username" placeholder="Username" autofocus autocomplete="off" required>
          </div>
          <!-- Grup input untuk password -->
          <div class="form-group">
            <!-- Label untuk input password -->
            <label class="control-label">Password</label>
            <!-- Input untuk password dengan tipe password agar karakter tidak terlihat -->
            <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>
          <!-- Tombol submit untuk login -->
          <div class="form-group btn-container">
            <!-- Tombol login dengan teks 'Masuk' dan ikon sign-in -->
            <button class="btn btn-primary btn-block" style="background-color:#2F4F4F" name="login">Masuk <i class="fa fa-sign-in fa-lg"></i></button><br>
          </div>
        </form>
      </div>
    </section>

  </body>
  
  <!-- Menambahkan JavaScript eksternal untuk fungsi tambahan pada halaman -->
  <script src="assets/js/jquery-2.1.4.min.js"></script>
  <script src="assets/js/essential-plugins.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/plugins/pace.min.js"></script>
  <script src="assets/js/main.js"></script>
</html>
