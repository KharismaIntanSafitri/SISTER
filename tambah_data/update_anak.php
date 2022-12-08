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

$tb_pengajuan = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT tb_pengajuan.nik_user FROM tb_pengajuan WHERE tb_pengajuan.nik_user='$niik_user' AND tb_pengajuan.waktu_pengajuan='$tgl'"));
$id_pengajuan = $tb_pengajuan["id_pengajuan"];
$up_anak = mysqli_query($koneksi,"UPDATE tb_anak SET nama='$nama', kode_poli='$kode_poli', nama='$nama', umur='$umur', alamat='$alamat', keluhan_anak='$keluhan_anak' where id_pengajuan_anak='$id_pengajuan'");  

if($up_anak)  {
    $_SESSION["pesan"] = "sukses";
    header("location: ../admin/page_admin.php");
}else{
    $_SESSION["pesan"] = "gagal";
    header("location: ../admin/page_admin.php");
}
?>
