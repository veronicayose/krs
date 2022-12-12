<?php 
    $sql = $mysqli->query("SELECT * FROM mahasiswa_dosen_kurikulum_view WHERE nim = '$username'");
    $result = $sql->fetch_assoc();
?>
<div class="card" style="padding: 30px;">
    <div class="table-responsive text-nowrap" style="margin-top: 10px;">
        <table class="table">
            <thead>
                <h2 class="col"><center>Data Mahasiswa</center></h2>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $result['nim'] ?></td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>:</td>
                    <td><?= $result['nama_mahasiswa'] ?></td>
                </tr>
                <tr>
                    <td>Tahun Kurikulum</td>
                    <td>:</td>
                    <td><?= $result['tahun_berlaku'] ?></td>
                </tr>
                <tr>
                    <td>Nama Dosen PA</td>
                    <td>:</td>
                    <td><?= $result['nama_dosen'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>