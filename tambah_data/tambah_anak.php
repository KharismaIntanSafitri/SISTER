<?php
include "../connect/koneksi.php";
session_start();
$nama = $_GET["nama"];
$umur = $_GET["umur"];
$alamat = $_GET["alamat"];
$keluhan = $_GET["keluhan"];
$nik_user = $_SESSION["nik"];
$kode_poli = $_GET["kode_poli"];
$tgl = $_GET["tgl"];

$tb_pengajuan = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT tb_pengajuan.id_pengajuan FROM tb_pengajuan WHERE tb_pengajuan.nik_user='$nik_user' AND tb_pengajuan.waktu_pengajuan='$tgl'"));
$id_pengajuan = $tb_pengajuan["id_pengajuan"];
$tambah = mysqli_query($koneksi,"INSERT INTO tb_anak (id_pengajuan_anak, nik_user, kode_poli, nama, umur, alamat, keluhan_anak)  
VALUES('$id_pengajuan', '$nik_user', '$kode_poli', '$nama', '$umur', '$alamat', '$keluhan')");

if($tambah)  {
    $_SESSION["pesan"] = "sukses";
    header("location: ../user/home.php");
}else{
    $_SESSION["pesan"] = "gagal";
    header("location: ../admin/user/home.php ");
}
?>