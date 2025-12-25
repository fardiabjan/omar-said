<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>

<!doctype html>
<html >
  <head>


    <title>Admin</title>

    <style type="text/css">
      .container {
            display: flex;
            flex-direction: column;
            height: 100vh; /* Menetapkan tinggi kontainer agar mengisi seluruh tinggi layar */
        }

       header{
            background-color: #1b1b1b;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex; 
            justify-content: space-between;
            
        }

        header p{
          font-size: 30px;
          padding-bottom: 15px;
          width: 700px;
          font-family: arial black;

        }

        .row{
            flex: 1; /* Menggunakan fleksibilitas untuk memenuhi tinggi sisa kontainer */
            background-color: #f0f0f0;
            margin-top: 18px;
        }

        .row{
            flex: 1; /* Menggunakan fleksibilitas untuk memenuhi tinggi sisa kontainer */
            background-color: #ccc;
            padding: 20px;
        }
       main.menu {
           
            background-color: #bbb;
            padding: 20px;
            text-align: center;
            margin-left: 10px;
        }
        .row{
          display: flex;
          flex-direction: row;
        }

        .judul {
      margin: 10px; /* Jarak antara item konten */
        }
        .p {
      margin: 10px; /* Jarak antara item konten */
        }
    </style>
  </head>

  <body>
   
      <header class="head">
      <a class="judul" href="#" >
        E-Minyak Tanah
      </a>
      <p class="p">Sistem Informasi Pangkalan Minyak Tanah</p>
      <a class="keluar" href="#" >
        keluar
      </a>
    </header>


    <div class="container">
      <div class="row">
        <?php include 'menu.php';?>

        <main role="main" class="menu">
          <?php
          $page = (isset($_GET['to']))? $_GET['to'] : "main";
          switch ($page) {
            case '01beranda': include "beranda.php"; break;

            
            case '02datapangkalan' : include "pangkalan.php" ; break;
            case '02inputdata': include "input_pangkalan.php" ; break;
            case '02ubahpangkalan': include "pangkalan_ubah.php"; break;
            case '02hapuspangkalan': include "pangkalan_hapus.php"; break;

            case '03datatransaksi' : include "transaksi.php" ; break;
            case '03inputdata': include "input_transaksi.php" ; break;
            case '03ubahtransaksi': include "transaksi_ubah.php"; break;
            case '03hapustransaksi': include "transaksi_hapus.php"; break;

            case '04pelanggan': include "pelanggan.php"; break;
            case '04hapuspelanggan': include "hapus_pelanggan.php"; break;      
            case '04hapuspelanggan': include "ubah_pelanggan.php"; break;                         
            case 'main' :
            default : include "pelanggan.php";

            case '05datakirimwa' : include "kirim_WA.php" ; break;
            case '05inputdatawa': include "input_kirim_WA.php" ; break;
            case '05ubahkirim': include "kirim_ubah.php"; break;
            case '05hapuskirim': include "kirim_hapus.php"; break;

            case '06datapesan' : include "pesan.php" ; break;
            case '05inputpesan': include "input_pesan.php" ; break;
            case '05ubahpesan': include "pesan_ubah.php"; break;
            case '05hapuspesan': include "pesan_hapus.php"; break;

          }
          ?>          
        </main>
      </div>
    </div>

  </body>
</html>
