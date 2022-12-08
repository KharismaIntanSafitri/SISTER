<?php
include "../connect/koneksi.php";
session_start();
$id_pengajuan = $_GET["id_pengajuan"];
$delete = mysqli_query($koneksi,"DELETE from tb_pengajuan where tb_pengajuan.id_pengajuan='$id_pengajuan'");
if($delete){
    $_SESSION["pesan"] = "sukses";
    header("location: ../admin/page_admin.php");
}else{
    $_SESSION["pesan"] = "gagal";
    header("location: ../admin/page_admin.php");
}
?>