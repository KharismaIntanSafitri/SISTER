<?php
session_start();
// di gunakan agar tidak dapat masuk ke tampilan user maupun admin
if(isset($_SESSION['nik'])){
    if($_SESSION["nik"]== "admin"){
        header('location: ../admin/page_admin.php');
        exit;
    }else if($_SESSION["nik"]!="admin"){
        header('location: ../user/home.php');
        exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/7edde9a01a.js" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="../assets/img/puskesmas.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.7.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center" >
        <div class="logo" > 
            <h1><a href="index.html">Puskesmas Kecamatan Benjeng</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
        </div>
        <nav id="navbar" class="navbar">
            <ul>
            <li><a  href="#">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="#">Services</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        </div>
    </header>
 
<!-- End Header -->
  <!-- ======= Hero Section ======= -->
  
  
  <section id="hero">
    <div class="fix" > 
    
      <div class="container" style="margin-top:45px; padding-bottom:18px;">
        <img src="../assets/img/puskesmas.png" alt="" class="img-fluid" style="width: 17%; margin-left: 8%; margin-bottom: 12%; margin-top: -7%;  ">
        <h4 class="text-center" style="margin-top: -25%; margin-left: 16%; margin-right: -4%">FORM LOG-IN</h4>
        
        <hr>
        <form method="POST">
          <div class="form-group">
            <label for="" style="margin-bottom: 5px;">NIK</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
              </div>
              <input type="text" name="nik" class="form-control" placeholder="Masukan NIK" style="margin-bottom: 5px;">
            </div>
          </div>

          <div class="form-group">
            <label for="" style="margin-bottom: 5px;">Sandi</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text " style="height: 38px;"><i class="fas fa-key"></i></div>
              </div>
              <input type="text" name="sandi" class="form-control" placeholder="Masukan Sandi" style="margin-bottom: 5px;">
            </div>
          </div>
          <?php
          include "../connect/koneksi.php";
          include "../proses_login/verif_login.php";
          ?>
          <button type="submit" name="button" class="btn-primary" style="margin-top: 5px;">submit</button>
        </form>
      </div>
    </div>
  </section>  
  <!-- End Hero -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. Pare N0.3 <br>
              Benjeng, Gresik<br>
              Jawa Timur <br><br>
              <strong>Phone:</strong> +62 857 3367 4996<br>
              <strong>Email:</strong> puskesmasbenjeng@gmail.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About Eterna</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Eterna</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>