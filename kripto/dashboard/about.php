<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($koneksi,$sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysqli_query($koneksi,"SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>
  <head>
    <title><?php echo $data['fullname']; ?> - Tentang AES-128</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <!-- sidebar  header -->
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <header class="main-header hidden-print"><a class="logo" href="index.php" style="font-size:18pt; font-family: Times new roman; background-color: #2F4F4F;"><span>KELOMPOK 8</span></a>
        <nav class="navbar navbar-static-top" style="background-color: #2F4F4F;">
          <a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="../assets/images/logoku.png" alt="User Image"></div>
            <div class="pull-left info">
              <p style="margin-top:-5px;"><?php echo $data['fullname']; ?></p>
              <p class="designation"><?php echo $data['job_title']; ?></p>
              <p class="designation" style="font-size:6pt;">Aktivitas Terakhir: <?php echo $data['last_activity'] ?></p>
            </div>
          </div>
          <ul class="sidebar-menu" >
            <li><a href="index.php"><i class="fa fa-home" ></i><span>Dashboard</span></a></li>
            <?php
				$v = $_SESSION['username'];
            $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username='$v'");
            $users = mysqli_fetch_array($query);
            if ($users['status'] == 1) {
              echo '<li class="treeview"><a href="#"><i class="fa fa-file-o"></i><span>File</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="encrypt.php"><i class="fa fa-circle-o"></i> Enkripsi</a></li>
              <li><a href="decrypt.php"><i class="fa fa-circle-o"></i> Dekripsi</a></li>
              </ul>
              </li>
              <li><a href="tes.php"><i class="fa fa-gears"></i><span>Tes Avalanche Effect</span></a></li>
              <li><a href="tes_enthopy.php"><i class="fa fa-hourglass-half"></i><span>Tes Entropy</span></a></li>';
            }elseif ($users['status'] == 2) {
              echo '<li class="treeview"><a href="#"><i class="fa fa-file-o"></i><span>File</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="decrypt.php"><i class="fa fa-circle-o"></i> Dekripsi</a></li>
              </ul>
            </li>';
            }else {
              echo "";
            }
             ?>

            <li><a href="history.php"><i class="fa fa-list-alt"></i><span>Daftar Riwayat</span></a></li>
            <li><a href="about.php"  style="border-color:#fff;background-color: #778899;"><i class="fa fa-info"></i><span>Tentang</span></a></li>
            <li><a href="help.php"><i class="fa fa-question-circle"></i><span>Bantuan</span></a></li>
          </ul>
        </section>
      </aside>
      <!--  -->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1 style = "color : #2F4F4F"><i class="fa fa-info" style = "color : #2F4F4F"></i> Tentang</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="index.php" style = "color : #2196F3">Dashboard</a></li>
              <li>Tentang</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <legend>Aplikasi Enkripsi dan Dekripsi AES-128</legend>
                <p style=”text-align:justify;text-indent:0.3in;”>Masalah ancaman keamanan dari aset atau informasi penting pada suatu sistem dan lebih lagi jika terhubung dengan jaringan lain maka sistem
                 tersebut memiliki resiko besar untuk mendapat ancaman. Pentingnya sebuah informasi memunculkan keinginan supaya informasi atau suatu aset hanya dapat diakses oleh pihak tertentu saja
                Terdapat beberapa metode yang dapat dilakukan salah satunya dengan kriptografi atau menyamarkan data. Menurut Talbot dan Welsh (2006) kriptografi merupakan seni menulis dengan karakter khusus yang jauh dari aslinya dan hanya dapat diketahui oleh pihak yang memproses. 
                dari itu sangat diperlukan pengamanan ketika berkas sedang diproses.<br><br></p>
                <p style=”text-align:justify;text-indent:0.3in;”>Metode algoritma yang dipilih dalam hal ini adalah algoritma Advanced Encryption Standard (AES) dengan panjang kunci 128 bit. Pemilihan algoritma Advanced Encryption Standard (AES) – 128 bit dipilih dalam menjaga kerahasiaan isi dari sebuah file, dikarenakan algoritma AES-128 terbukti ketahanannya terhadap serangan analisis konvensional linier maupun diferensial attack. Proses dari enkripsi dan dekripsi algoritma tersebut harus melakukan 10 putaran atau iterasi untuk mengamankan ataupun membukanya maka sukar untuk dipecahkan.
                </p><br><br>
                <p style=”text-align:justify;text-indent:0.3in;”>Penggunaan kombinasi algoritma MD5 juga digunakan dalam penyandian kunci AES-128 sebelum melakukan enkripsi ataupun  dekripsi. Algoritma MD-5 atau Message-Digest algortihm 5 merupakan fungsi hash satu arah yang mengubah suatu data dengan panjang tertentu dengan adanya proses menyisipkan data didalamnya sehingga susah untuk dipulihkan kembali walaupun melihat bentuk dari hash tersebut. Tujuan penyandian ini agar lebih menguatkan kunci yang digunakan pada algoritma Advanced Encryption Standard (AES) 128 bit. 
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
