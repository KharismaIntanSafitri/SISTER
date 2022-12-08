<?php
include "../connect/koneksi.php";
session_start();
if(isset($_POST["tambah_data"])){
  $keluhan = $_POST["keluhan"];
  $nama = $_POST["nama"];
  $umur = $_POST["umur"];
  $alamat = $_POST["alamat"];
  $nik_user = $_SESSION['nik'];
  $kode_poli = $_POST["kode_poli"];

  // set jam asia di jakarta
date_default_timezone_set('Asia/Jakarta');
$tgl = date('y-m-d H:i:s'); //mengambil jam dan tgl sekarang
//echo $tgl;

  $tb_pengajuan = mysqli_query($koneksi, "INSERT INTO tb_pengajuan(nik_user, kode_poli, waktu_pengajuan, keluhan, status_pengajuan) VALUES('$nik_user', '$kode_poli', '$tgl', '$keluhan', 'Menunggu')");
  if($tb_pengajuan){
      header("location: ../tambah_data/tambah_anak.php?kode_poli=$kode_poli&nama=$nama&umur=$umur&alamat=$alamat&keluhan=$keluhan&tgl=$tgl");
	}
}
?>