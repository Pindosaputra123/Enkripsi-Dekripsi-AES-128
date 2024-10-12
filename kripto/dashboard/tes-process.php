<?php
session_start();
include "../config.php"; //memasukkan koneksi
include "AES.php"; //memasukkan file AES

if (isset($_POST['tes'])){
    $idfile    = ($_POST['fileid']);
    $pwdfile   = (substr(md5($_POST["pwdfile"]), 0,16));
    $pwdnonmd  = ($_POST["pwdfile"]);
    $query1     = "SELECT * FROM file WHERE id_file='$idfile'";
    $sql1       = mysqli_query($koneksi,$query1);
    $data       = mysqli_fetch_assoc($sql1);
    
    
    $url        = $data["file_name_source"];
    $file_path  = "terupload/$url";
    $file_name  = $data["file_name_finish"];
    $size       = $data["file_size"];
    
    $file_size  = filesize($file_path);
    
    
    $sql2   = "UPDATE file SET kunci_tes ='$pwdfile' WHERE id_file = '$idfile'";
    $query2  = mysqli_query($koneksi,$sql2) or die(mysql_error());
    
    $sql3   = "UPDATE file SET password_tes ='$pwdnonmd' WHERE id_file = '$idfile'";
    $query3  = mysqli_query($koneksi,$sql3) or die(mysql_error());
    
    $mod        = $file_size%16;
    
    $aes        = new AES($pwdfile);
    $fopen1     = fopen($file_path, "rb");
   
    $cache      = "terupload/$file_name";
    $fopen2     = fopen($cache, "wb");
    
    if($mod==0){
        $banyak = $file_size / 16;
    }else{
        $banyak = ($file_size - $mod) / 16;
        $banyak = $banyak+1;
    }
    
    ini_set('max_execution_time', -1);
    ini_set('memory_limit', -1);
    
    for($bawah=0;$bawah<$banyak;$bawah++){
        
        $filedata    = fread($fopen1, 16);
        $chiper       = $aes->encrypt($filedata);
        fwrite($fopen2, $chiper);
    }
    $_SESSION["download"] = $cache;
    
    fclose($fopen1);
    fclose($fopen2);
    
    // ava
    $url2 = $data["file_name_finish"];
    
    $filepath1 = "file_encrypt/$url2";
    $filepath2 = "terupload/$url2";
    
    $fopenplain   = fopen($filepath1, "rb");
    $fopentes     = fopen($filepath2, "rb");
    $tesavalanche= 0;
    for($bawah=0;$bawah<$banyak;$bawah++){
        
        $plainava = fread($fopenplain,16);
        $data1 = str_split($plainava);
        $tesava = fread($fopentes,16);
        $data2 = str_split($tesava);

        $en1=[]; #array pengumpul enkripsi 1
        $en2=[]; #array pengumpul enkripsi 2
        
        for($bwh=0;$bwh<16;$bwh++){
            $en1[] = str_pad(decbin(ord($data1[$bwh])),8,0);
            $en2[]= str_pad(decbin(ord($data2[$bwh])),8,0);
        }
    
        // // jika perbandingan menggunakan satu persatu biner
        // $enstr1=implode($en1); #menggabungkan menjadi 1 string
        // $enstr2=implode($en2); #menggabungkan menjadi 1 string
        // $ensplit1=str_split($enstr1); #memecah string menjadi satu satu
        // $ensplit2=str_split($enstr2); #memecah string menjadi satu satu
         

        $same=0;
        for ($bwh=0;$bwh<16;$bwh++){
                if($en1[$bwh]!=$en2[$bwh]){
                        $same++;
                    }
                else{
                    $same = $same + 0;
                    }
            }
        $tesavalanche=(($same/16)*100) + $tesavalanche;
    }
    // echo($data1);
    // echo($data2);
    // print_r($ensplit1);
    // echo"\n";
    // print_r($ensplit2);

    fclose($fopenplain);
    fclose($fopentes);
    
    $kunci_plain1 = $data["kunci"];#kunci awal plain
    $kunci_plain2 = $data["password"];#kunci awal dengan md 5
    
    $a=$data["id_file"];
    
    $hasiltes=$tesavalanche/$banyak;
    $sql4   = "UPDATE file SET tes_ava ='$hasiltes' WHERE id_file = '$idfile'";
    $query4  = mysqli_query($koneksi,$sql4) or die(mysql_error());
    
    
    echo("<script language='javascript'>
    window.location.href='tes_ava.php?id_file=$a';
    window.alert('Jumlah avalanche effect enkripsi file $url menggunakan kunci $kunci_plain1 diubah menjadi $kunci_plain2 menggunakan penyandian MD5 dengan $pwdnonmd diubah menjadi $pwdfile menggunakan penyandian MD5 adalah $hasiltes %');
    </script>");
    
}

?>