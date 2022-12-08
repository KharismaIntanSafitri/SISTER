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
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <?php include "../desain/sidebar_admin.php";?>
    <?php include "../desain/navbar_admin.php";?>
  
    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Halaman kepala -->
        <h1 class="h3 mb-2 text-gray-800">Pengajuan Yang Di Terima</h1>
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
        <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Yang Di Terima</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kode Poli</th>
                                <th>Jenis Poli</th>
                                <th>Waktu Pengajuan</th>
                                <th>Keluhan</th>
                                <th>Nomor Antrian</th>
                                <th>Data User</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../db/data_diterima.php"
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Safari Hotel 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/js_sidebar.js"></script>
    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>
</html>