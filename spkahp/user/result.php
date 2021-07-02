<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SPK KAPAL</title>
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
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>HASIL PEMILIHAN KAPAL</h1>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
    
        <form action="deluxe/rooms.php" method="post" id="quiz">

            <style type="text/css">
            .element {
        position: relative;
        align-items: center;
        top: 50px;
        left:650px;
         
    }
        </style>


       <div class="element">
        <?php
            
            

            if (empty($_POST['question-1-answers']) or empty($_POST['question-2-answers']) or empty($_POST['question-3-answers'])or empty($_POST['question-4-answers'])or empty($_POST['question-5-answers'])or empty($_POST['question-6-answers'])) {
                 ?>
                 <script> 
                
                    confirm("isi semua pertanyaan");
                    window.location.href="pertanyaan.php"; 


                
                </script> 
                <?php
                # code...
            }
            // else {
            // if (empty($)) {
            //     echo "isi semua pertanyaan";
            //     # code...
            // }
            else{


            $hargasewa = $_POST['hargasewa'];
            $kapasitas = $_POST['kapasitas'];
        
            //$totalCorrect = "0";
            
            if ($hargasewa <= 4500000) { $totalCorrect1 = 0.073; }
            if ($hargasewa <= 4500000) { $totalCorrect1 = 0.073; }

            if ($kapasitas == "A") { $totalCorrect2 = 0.006; }
            if ($answer2 == "B") { $totalCorrect2 = 10; }
            if ($answer2 == "C") { $totalCorrect2 = 20; }

            
          
            $totalCorrect = $totalCorrect1 + $totalCorrect2;


            
            //echo "<div id='results'>$totalCorrect ";
                     if ($totalCorrect <= 0.051 ){
                        ?>
                        <input type="hide" style="background:transparent;text-align:center;" name="status" class="form-control" value="Kapal Black Pearl" readonly />
                        <?php
                        
                    }
                     if ($totalCorrect > 0.051 and $totalCorrect <= 0.056 ){
                        ?>
                        <input type="hide" style="text-align:center; background:transparent;" name="status" class="form-control" value="Kapal Pramuka Express" readonly />
                        <?php
                    }
                    if ($totalCorrect > 0.056 and $totalCorrect <= 0.060 ){
                        ?>
                        <input type="hide" style="text-align:center; background:transparent;" name="status" class="form-control" value="Kapal Pramuka Express" readonly />
                        <?php
                    }
                     
                }

                 
        ?>



        <br><br>
        <input type="submit" value="Lihat Hasil Jawaban" class="tombol" />
    
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