<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_pengajuan  INNER JOIN tb_poli ON tb_pengajuan.kode_poli=tb_poli.kode_poli AND tb_user.nik=tb_pengajuan.nik_user");
while ($row = mysqli_fetch_assoc($tb_pengajuan)):
    if($row["status_pengajuan"]=="Menunggu"){?>
        <tr>
            <td><?= $row["nik_user"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["kode_poli"] ?></td>
            <td><?= $row["jenis_poli"] ?></td>
            <td><?= $row["waktu_pengajuan"] ?></td>
            <td><?= $row["keluhan"] ?></td>
            <?php
            if($row["kode_poli"]=="A"){?>
                <td>
                    <a href="../data_input/data_anak.php?id_pengajuan=<?= $row['id_pengajuan']?>">View Data</a>
                </td>
            <?php }elseif($row["kode_poli"]=="B"){?>
                <td>
                    <a href="../data_input/data_umum.php?id_pengajuan=<?= $row['id_pengajuan']?>">View Data</a>
                </td>
            <?php }elseif($row["kode_poli"]=="C"){?>
                <td>
                    <a href="../data_input/data_lab.php?id_pengajuan=<?= $row['id_pengajuan']?>">View Data</a>
                </td>
            <?php }?>
            
            <td>
                <a href="../update_data/sederhanahapus.php?id_pengajuan=<?= $row["id_pengajuan"]?>&kode_poli=<?= $row["kode_poli"]?>&nik_user=<?= $row["nik_user"]?>"><button type="button" class="btn btn-primary" style="margin-bottom: 10px;">Terima</button></a>
                <a href="../update_data/sederhanaedit.php?id_pengajuan=<?= $row["id_pengajuan"]?>&kode_poli=<?= $row["kode_poli"]?>&nik_user=<?= $row["nik_user"]?>"><button type="button" class="btn btn-danger">Tolak</button></a>
            </td>
        </tr>
    <?php
    }
endwhile; 
?>