<?php
include "../connect/koneksi.php";
session_start();
$id_pengajuan = $_GET["id_pengajuan"];
$jenis_poli = $_GET["jenis_poli"];
$nama = $_GET["nama"];
$nama_file = $_FILES["file"]["name"];
$size = $_FILES["file"]["size"];
$lokasi = $_FILES["file"]["tmp_name"];
$error = $_FILES["file"]["error"];
$pemisah = explode('.', $nama_file);
$ekstention = strtolower(end($pemisah));
$namaBaru = $id_pengajuan . '-' . $nama . '.' . $ekstention;

if (in_array($ekstention, ['doc', 'docx', 'pdf']) and $size <= 10000000 and $error == 0) {
    if (move_uploaded_file($lokasi, "../antrian_keluar/" . $namaBaru)) {
        $update = mysqli_query($koneksi, "UPDATE tb_antrian_keluar SET tb_antrian_keluar.file_antrian='$namaBaru' where tb_antrian_keluar.id_pengajuan='$id_pengajuan'");
        if ($update) {
            header("location: ../admin/diterima.php?id_pengajuan=$id_pengajuan");
            $_SESSION["pesan"] = "sukses";
            echo "Berhasil";
        } else {
            header("location: ../admin/diterima.php?id_pengajuan=$id_pengajuan");
            $_SESSION["pesan"] = "gagal";
            echo "Gagal";
        }
    }
} else {
    header("location: ../admin/diterima.php?id_pengajuan=$id_pengajuan");
    $_SESSION["pesan"] = "gagal";
    echo 'Gagal 2';
}
