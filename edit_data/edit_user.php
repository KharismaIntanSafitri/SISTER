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
    <?php include "../desain/navbar_admin.php";
    $nik = $_GET["nik"];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * from tb_user where nik='$nik'"));
    ?>

    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
            <form action="../update_data/update_user.php?nik_lama=<?= $nik?>" method="POST">
                    <div class="form-group row">
                      <label for="input_nama_barang" class="col-sm-2 col-form-label">NIK</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="<?= $data['nik']?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="input_nama_barang" class="col-sm-2 col-form-label">Nama</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?= $data['nama']?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="input_stock_barang" class="col-sm-2 col-form-label">No.Hp</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan no hp" value="<?= $data['no_hp']?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="input_stock_barang" class="col-sm-2 col-form-label">Sandi</label>
                      <div class="col-md-3">
                        <input type="text" class="form-control" name="sandi" placeholder="Masukkan sandi" value="<?= $data['sandi']?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update_user">UPDATE</button>
                        <a href="../admin/user.php"><button type="button" class="btn btn-primary" name="batal">Batal</button></a>
                      </div>
                    </div>
                    <?php
                    if(isset($_SESSION["pesan"])){
                      if($_SESSION["pesan"]=="sukses"){?>
                        <script>Swal.fire('SUKSES','DATA BERHASIL DI RUBAH','success')</script>
                        <?php unset($_SESSION["pesan"]);
                      }elseif($_SESSION["pesan"]== "gagal"){?>
                        <script>Swal.fire('ERROR','DATA GAGAL DI RUBAH','error')</script>
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