<?php
include "../connect/koneksi.php";
$tb_pengajuan = mysqli_query($koneksi,"SELECT tb_antrian_keluar.nomor_antrian, tb_antrian_keluar.kode_poli, tb_antrian_keluar.nik_user, tb_antrian_keluar.file_antrian, tb_user.nama, tb_poli.jenis_poli FROM tb_antrian_keluar INNER JOIN tb_user ON tb_antrian_keluar.nik_user=tb_user.nik INNER JOIN tb_poli ON tb_poli.kode_poli= tb_antrian_keluar.kode_poli");
while ($row = mysqli_fetch_assoc($tb_pengajuan)):?>
        <tr>
            <td><?= $row["nomor_antrian"] ?></td>
            <td><?= $row["nama"] ?></td>
            <td><?= $row["nik_user"] ?></td>
            <td><?= $row["kode_poli"] ?></td>
            <td><?= $row["jenis_poli"] ?></td>
            <td>
                <a href="../antrian_keluar/<?= $row['file_antrian']?>"><button type="button" class="btn btn-primary">Download</button></a>
            </td>
        </tr>
    <?php 
endwhile; 
?>