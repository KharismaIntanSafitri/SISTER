<?php
session_start();
include "../connect/koneksi.php";
if( isset($_POST["update_user"]) ){
    $nik_lama = $_GET["nik_lama"];
    $nik_baru = $_POST["nik"];
    $nama = $_POST["nama"];
    $up = ucfirst($nama);
    $no_hp= $_POST["no_hp"];
    $sandi= $_POST["sandi"];
    if($nik_baru==$nik_lama){
        // memasukkan data kamar ke dalam database
        $update = mysqli_query($koneksi,"UPDATE tb_user SET nik='$nik_lama', nama='$nama', no_hp=$no_hp, sandi=$sandi WHERE tb_user.nik='$nik_lama'");
        // cek data berhasil di masukkan atau tidak
        if($update){
            header("location: ../admin/user.php");
            $_SESSION["pesan"] = "sukses1";
            echo "Berhasil1";
        }else{
            header("location: ../admin/user.php");
            $_SESSION["pesan"] = "gagal";
            echo "Gagal2";
        }
    }else{
        $cek_nik =mysqli_query($koneksi,"SELECT * FROM tb_user WHERE nik='$nik_baru'");
        if(!mysqli_num_rows($cek_nik)){
            $update = mysqli_query($koneksi,"UPDATE tb_user SET nik='$nik_baru', nama='$nama', no_hp='$no_hp', sandi='$sandi' WHERE tb_user.nik='$nik_lama'");
            // cek data berhasil di masukkan atau tidak
            if($update){
                header("location: ../admin/user.php");
                $_SESSION["pesan"] = "sukses1";
                echo "Berhasil1";
            }else{
                header("location: ../admin/user.php");
                $_SESSION["pesan"] = "gagal";
                echo "Gagal2";
            }
        }else{
            header("location: ../admin/user.php");
            $_SESSION["pesan"] = "gagal1";
            echo "Gagal3";
        }
    }
}
?>