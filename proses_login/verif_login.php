<?php
if(isset($_POST["button"])){
    $nik = $_POST["nik"];
    $sandi = $_POST["sandi"];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT nik, sandi from tb_user where nik='$nik' and sandi='$sandi'"));

    if($nik and $sandi){
        if($data){
            if($nik=="admin"){
                $_SESSION["nik"] = $nik;
                echo "<script>location.href = '../admin/page_admin.php'</script>";
                //header("location: ../admin/page_admin.php");
            }else{
                $_SESSION["nik"] = $nik;
                echo "<script>location.href = '../user/home.php'</script>";
                //header("location: ../user/home.php");
            }
        }else{?>   
            <div style="color: red;"><i><?= "NIK dan sandi Tidak Sesuai";?></i></div>
        <?php }
    }else{?>
        <div style="color: red;"><i><?= "Isi kolom NIK dan sandi";?></i></div> 
    <?php }
}?>