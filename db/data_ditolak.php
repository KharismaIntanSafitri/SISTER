<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_pengajuan  INNER JOIN tb_poli ON tb_pengajuan.kode_poli=tb_poli.kode_poli AND tb_user.nik=tb_pengajuan.nik_user");
while ($row = mysqli_fetch_assoc($tb_pengajuan)):
    if($row["status_pengajuan"]=="Di Tolak"){?>
        <tr>
            <td><?= $row["nik_user"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["kode_poli"] ?></td>
            <td><?= $row["jenis_poli"] ?></td>
            <td><?= $row["waktu_pengajuan"] ?></td>
            <td><?= $row["keluhan"] ?></td>
        </tr>
    <?php
    }
endwhile; 
?>