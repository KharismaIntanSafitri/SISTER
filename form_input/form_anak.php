<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form Poli Anak</title>
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
    <?php include "../desain/navbar.php"?>
    <div class="fix"> 
      <div class="container" style="margin-top: 40px; margin-bottom: 50px;">
        <h4 class="text-center">Formulir Poli Anak</h4>
        <hr>
        <form action="../tambah_pengajuan/pengajuan_anak.php?kode_poli=A" method="POST">
            <h3>Data Pasien</h3>
            <label for="" style="margin-bottom: 5px;">Nama Pasien</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
              </div>
              <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pasien" style="margin-bottom: 5px;" required>
            </div>

            <label for="" style="margin-bottom: 5px;">Umur Pasien</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
              </div>
              <input type="text" name="umur" class="form-control" placeholder="Masukan Umur Pasien" style="margin-bottom: 5px;" required>
            </div>

            <label for="" style="margin-bottom: 5px;">Alamat Pasien</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
              </div>
              <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Dusun RT/RW Desa Kecamatan" style="margin-bottom: 5px;" required>
            </div>

            <div class="form-group">
              <label for="" style="margin-bottom: 5px;">Keluhan</label>
              <div class="input-group" style="margin-bottom: 5px;">
                <textarea class="form-control" name="keluhan" rows="3" required></textarea>
            </div>
          <button type="submit" name="button" class="btn-primary" style="margin-top: 5px;">submit</button>
        </form>
      </div>
    </div>
  <!-- End Hero -->
  <?php include "../desain/footer.php"?>

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