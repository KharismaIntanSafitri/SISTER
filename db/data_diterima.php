<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi,"SELECT * FROM tb_user INNER JOIN tb_pengajuan INNER JOIN tb_poli INNER JOIN tb_antrian_keluar ON tb_pengajuan.kode_poli=tb_poli.kode_poli AND tb_user.nik=tb_pengajuan.nik_user AND tb_antrian_keluar.id_pengajuan=tb_pengajuan.id_pengajuan");
while ($row = mysqli_fetch_assoc($tb_pengajuan)):
    if($row["file_antrian"] == ''){?>
        <tr>
            <td><?= $row["nik_user"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["kode_poli"] ?></td>
            <td><?= $row["jenis_poli"] ?></td>
            <td><?= $row["waktu_pengajuan"] ?></td>
            <td><?= $row["keluhan"] ?></td>
            <td><?= $row["nomor_antrian"] ?></td>
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
                <a href="../admin/uplod.php?id_pengajuan=<?= $row["id_pengajuan"]?>&jenis_poli=<?= $row['jenis_poli']?>&nama=<?= $row["nama"] ?>&kode_poli=<?= $row['kode_poli']?>"><button type="button" class="btn btn-primary">Upload</button></a>
            </td>
        </tr>
    <?php
    }
endwhile; 
?>