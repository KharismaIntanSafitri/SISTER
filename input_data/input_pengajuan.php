<?php
include "../connect/koneksi.php";
include "../proses_login/session_login.php";
$nik = $_SESSION["nik"];
$tb_user = mysqli_query($koneksi,"SELECT * FROM tb_user where nik='$nik'");
$data = mysqli_fetch_assoc($tb_user);
$nama = $data["nama"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/img/gresik.png" rel="icon">
    
</head>
<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php include "../desain/sidebar_admin.php";?>
    <?php include "../desain/navbar_admin.php";?>

    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah pengajuan</h6>
            </div>
            <div class="card-body">
                <form action="../proses_data/tambah_pengajuan.php" method="POST">
                    <input type="hidden" class="form-control" name="id_pengajuan" placeholder="Masukkan NIK">
                    <label for="" style="margin-bottom: 5px;">Kode poli </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
                            </div>
                            <select class="form-control form-control" name="kode_poli">
                                <option selected>Pilih</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                        </div>
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

                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="tambah_data">Tambah</button>
                        <a href="../admin/page_admin.php"><button type="button" class="btn btn-primary" name="batal">Batal</button></a>
                      </div>
                    </div>
                    <?php
                    if(isset($_SESSION["pesan"])){
                      if($_SESSION["pesan"]=="sukses"){?>
                        <script>Swal.fire('SUKSES','DATA BERHASIL DI TAMBAHKAN','success')</script>
                        <?php unset($_SESSION["pesan"]);
                      }elseif($_SESSION["pesan"]== "gagal"){?>
                        <script>Swal.fire('ERROR','DATA GAGAL DI TAMBAHKAN','error')</script>
                        <?php 
                        unset($_SESSION["pesan"]);
                      }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>
</html>