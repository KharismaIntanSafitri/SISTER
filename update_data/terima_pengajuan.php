<?php
include "../connect/koneksi.php";
session_start();
$id_pengajuan = $_GET["id_pengajuan"];
$kode_poli = $_GET["kode_poli"];
$nik_user = $_GET["nik_user"];
$hari=date('d');
$bulan = date('m');
$tahun = date('Y');
$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(tb_antrian_keluar.nomor_antrian) AS nomor FROM tb_antrian_keluar"));
$nomor = (string)$data["nomor"]+1;
if(strlen($nomor)==1){
    $nomor_antrian = $kode_poli.' - '.'0'.$nomor;
}else{
    $nomor_antrian = $kode_poli.' - '.$nomor;
}

$update = mysqli_query($koneksi,"UPDATE tb_pengajuan SET tb_pengajuan.status_pengajuan='Di Terima' where tb_pengajuan.id_pengajuan=$id_pengajuan");
$tambah_nomor_antrian = mysqli_query($koneksi,"INSERT INTO tb_antrian_keluar(nomor_antrian, id_pengajuan, kode_poli, nik_user, file_antrian) VALUES('$nomor_antrian',$id_pengajuan, '$kode_poli', '$nik_user', NULL)");
$tambah_antrianKeluar = mysqli_query($koneksi,"UPDATE tb_poli SET tb_poli.antrian_keluar= (SELECT tb_poli.antrian_keluar+1) WHERE tb_poli.kode_poli='$kode_poli'");

if($update && $tambah_nomor_antrian && $tambah_antrianKeluar){
    $_SESSION["pesan"] = "sukses";
    header("location: ../admin/page_admin.php");
    echo "Berhasil";
}else{
    $_SESSION["pesan"] = "gagal";
    header("location: ../admin/page_admin.php");
    echo "Gagal";
}
?>