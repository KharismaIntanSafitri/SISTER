<?php
session_start();
include "../connect/koneksi.php";
if( isset($_POST["update_pengajuan"]) ){
    $keluhan = $_POST["keluhan"];
    echo "$keluhan";
    $nama = $_POST["nama"];
    echo "$nama";
    $umur = $_POST["umur"];
    echo "$umur";
    $alamat = $_POST["alamat"];
    echo "$alamat";
    $nik_user = $_SESSION['nik'];
    echo "$nik_user";
    $kode_poli = $_POST["kode_poli"];
    echo "$kode_poli";
    $id_pengajuan = $_GET["id_pengajuan"];
    echo "$id_pengajuan";

    //$keluhan_baru=mysqli_query($koneksi,"UPDATE tb_pengajuan SET keluhan='$keluhan' where tb_pengajuan.id_pengajuan='$id_pengajuan' ");
    $update= mysqli_query($koneksi,"UPDATE tb_anak SET kode_poli='$kode_poli', nama='$nama', umur='$umur', alamat='$alamat', keluhan_anak='$keluhan'  where tb_anak.id_pengajuan_anak='$id_pengajuan' ");
    $pilih = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT tb_anak.keluhan_anak FROM tb_anak WHERE tb_anak.id_pengajuan_anak='$id_pengajuan'"));
    $keluhan_baru = $pilih["keluhan_anak"];
    $up_keluhan= mysqli_query($koneksi,"UPDATE tb_pengajuan SET keluhan='$keluhan_baru'  where tb_pengajuan.id_pengajuan='$id_pengajuan' ");
    
    // cek data berhasil di masukkan atau tidak
    if($update&&$up_keluhan){
            header("location: ../admin/page_admin.php");
            $_SESSION["pesan"] = "sukses1";
            //echo "Berhasil1";
      }else{
          header("location: ../admin/page_admin.php");
           $_SESSION["pesan"] = "gagal";
           // echo "Gagal2";
       }
   }

?>