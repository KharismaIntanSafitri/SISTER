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
    $id_pengajuan = $_GET["id_pengajuan"];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_pengajuan  INNER JOIN tb_poli ON tb_pengajuan.kode_poli=tb_poli.kode_poli AND tb_user.nik=tb_pengajuan.nik_user INNER JOIN tb_anak ON tb_pengajuan.id_pengajuan=tb_anak.id_pengajuan_anak where id_pengajuan='$id_pengajuan' "));
    ?>

    <!-- Awal Isi Konten -->
    <div class="container-fluid">
        <!-- Data Tabel -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Pengajuan</h6>
            </div>
            <div class="card-body">
            <form action="../update_data/update_pengajuan.php?id_pengajuan=<?= $id_pengajuan?>" method="POST">
            <input type="hidden" class="form-control" name="id_pengajuan" placeholder="Masukkan NIK">
                    <label for="" style="margin-bottom: 5px;">Kode poli </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
                            </div>
                            <select class="form-control form-control" name="kode_poli" >
                                <option selected><?= $data['kode_poli']?></option>
                                <option >A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                        </div>
                        <label for="" style="margin-bottom: 5px;">Nama Pasien</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
                </div>
                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Pasien" style="margin-bottom: 5px;" value="<?= $data['nama']?>"  required>
                </div>

                <label for="" style="margin-bottom: 5px;">Umur Pasien</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
                </div>
                <input type="text" name="umur" class="form-control" placeholder="Masukan Umur Pasien" style="margin-bottom: 5px;" value="<?= $data['umur']?>" required>
                </div>

                <label for="" style="margin-bottom: 5px;">Alamat Pasien</label>
                <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text " style="height: 38px;"><i class="fas fa-address-card"></i></div>
                </div>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Dusun RT/RW Desa Kecamatan" style="margin-bottom: 5px;" value="<?= $data['alamat']?>" required>
                </div>

                <div class="form-group">
                <label for="" style="margin-bottom: 5px;">Keluhan</label>
                <div class="input-group" style="margin-bottom: 5px;">
                    <textarea class="form-control" name="keluhan" rows="3"  required><?= $data['keluhan']?></textarea>
                </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update_pengajuan">UPDATE</button>
                        <a href="../admin/page_admin.php"><button type="button" class="btn btn-primary" name="batal">Batal</button></a>
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