<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Regna Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna - v4.3.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="index.php"><img src="assets/img/logo1.png" alt=""></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto active" href="kapal.php">Data Kapal</a></li>
          <li class="dropdown"><a href="#"><span>Harga Kapal</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="46.php">4JT - 6JT</a></li>
              <li><a href="615.php">6JT - 15JT</a></li>
              <li><a href="2060.php">20JT - 60JT</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Fasilitas Khusus Kapal</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="manc.php">Memancing</a></li>
              <li><a href="tmanc.php">Tidak Memancing</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Perhitungan SPK</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="proses.php">Proses</a></li>
              <li><a href="hasil.php">Hasil</a></li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>DATA ALTERNATIF KAPAL</h1>
      
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    <div class="panel panel-info">
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover table-responsive-md" id="dataTables-example">
                        <thead class="bg-success" align="center">
                            <tr style="color: white"> 
                                <th>Nomor</th>
                                <th>ID Kapal</th>
                                <th>Nama Kapal</th>
                                <th>Tipe Mesin</th>
                                <th>Harga Sewa</th>
                                <th>Kapasitas Jumlah Orang</th>
                                <th>Fasilitas Khusus</th>
                                <th>Kenyamanan Kapal</th>
                                
                            </tr>
                            </thead>
                             <?php
                            $id = 0;
                            $sql="SELECT * FROM kapal";
                            $result=mysqli_query($konek,$sql);
                            while($row=mysqli_fetch_array($result)){
                                $id++;
                                echo "
                                        <tr>
                                            <td align='center'>".$id."</td>
                                            <td>".$row[0]."</td>  
                                            <td>".$row[1]."</td>
                                            <td>".$row[2]."</td>
                                            <td>".$row[3]."</td>
                                            <td>".$row[4]."</td>
                                            <td>".$row[5]."</td>
                                            <td>".$row[6]."</td>
                                            
                                        </tr>   
                                    "; 
                                }
                                ?>
                        </table>
                        </form>
                    </div>
                </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>CINDI W</strong>. 2021
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
       
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>