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
    <title>Selamat datang, <?php echo $data['fullname']; ?> - Aplikasi Enkripsi dan Dekripsi AES-128</title>
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
            <li><a href="index.php" style="border-color:#fff;background-color: #778899;"><i class="fa fa-home" ></i><span>Dashboard</span></a></li>
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
            <li><a href="about.php"><i class="fa fa-info"></i><span>Tentang</span></a></li>
            <li><a href="help.php"><i class="fa fa-question-circle"></i><span>Bantuan</span></a></li>
          </ul>
        </section>
      </aside>
      <!--  -->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1 style = "color : #2F4F4F"><i class='fa fa-home' style = "color : #2F4F4F"></i> Dashboard</h1>
          </div>
          <div>
            <ul class="breadcrumb" >
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#" style = "color : #2196F3">Dashboard</a></li>
            </ul>
          </div>
        </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                  <div class="col-md-4">
                    <div class="widget-small info"><i class="icon fa fa-users fa-3x"></i>
                      <?php
      								$query = mysqli_query($koneksi,"SELECT * FROM users");
      								$datauser = mysqli_num_rows($query);
								      ?>
                      <div class="info">
                        <h4>Pengguna</h4>
                        <p> <b><?php echo $datauser; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="widget-small info"><i class="icon fa fa-briefcase fa-3x"></i>
                      <?php
      								$query = mysqli_query($koneksi,"SELECT * FROM file WHERE status='1'");
      								$dataencrypt = mysqli_num_rows($query);
								      ?>
                      <div class="info">
                        <h4>Enkripsi</h4>
                        <p> <b><?php echo $dataencrypt; ?></b></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="widget-small info"><i class="icon fa fa-files-o fa-3x"></i>
                      <div class="info">
                        <?php
        								$query = mysqli_query($koneksi,"SELECT * FROM file WHERE status='2'");
        								$datadecrypt = mysqli_num_rows($query);
  								      ?>
                        <h4>Dekripsi</h4>
                        <p> <b><?php echo $datadecrypt; ?></b></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row" >
          <div class="col-md-12" >
          <div class="card" style="background-color: #2196F3;">
            <div class="card-body">
          <center><img src="../assets/images/logo.png" alt="" class="img-responsive"></center>
        </div> -->
      </div>
    </div>
        </div>
        <footer>

</footer>
      </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
