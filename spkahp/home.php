<?php include "koneksi.php";
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" />
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <!-- MDBootstrap Datatables  -->
    <link href="css/addons/datatables.min.css" rel="stylesheet">
    
    <title>GO-SHIP</title>
  </head>
  <body>
    <?php 
            session_start();
            if($_SESSION['status']!="login"){
                header("location:login.php?pesan=belum_login");
            }
        ?>
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
      <div class="carousel-caption animated fadeInDown">
        <h1 class="h1-responsive">SPK SEWA KAPAL PRIVATE KEPULAUAN SERIBU</h1>
			</div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/kapal3.jpg" class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
            <img src="img/kapal2.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
            <img src="img/logokpl.jpg" class="d-block w-100">
            </div>
        </div>
    </div>
    <br>
    <div class="btn-group btn-group-lg btn-block col-md-auto" role="group">
      <li class="btn-group btn-group-lg col-md-4" role="group">
        <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Isi Data
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop">
          <a class="dropdown-item" href="ikapal.php">Alternatif Kapal</a>
        
        </div>
      </li>
      <li class="btn-group btn-group-lg col-md-4" role="group">
        <button id="btnGroupDrop" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Lihat Data
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop">
          <a class="dropdown-item" href="vkapal.php">Alternatif Kapal</a>
          <a class="dropdown-item" href="vkriteria.php">Kriteria</a>
          <a class="dropdown-item" href="vkonversi.php">Konversi Alternatif</a>
        </div>
      </li>
      <li class="btn-group btn-group-lg col-md-4" role="group">
        <a href="hasil.php" type="button" class="btn btn-success">Lihat Hasil</a>
      </li>
    </div>
    <br><br>





    
    <?php
    include "footer.html"
    ?>





