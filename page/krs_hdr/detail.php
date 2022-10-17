<?php 
    $id_krs_hdr = 1;
    $result = $mysqli->query("SELECT * FROM krs_hdr a JOIN mahasiswa b ON a.nim = b.nim WHERE id_krs_hdr=".$_GET['id_krs_hdr']);
    $row = $result->fetch_assoc();
    if (!$row) {
        include "page/not-found.php";
        exit;
    }
?>
<div class="card">
    <div class="card-header row">
        <h5 class="row"><center><b>KARTU RENCANA STUDI</center></b></h5>
        <table >
            <tbody>
                <tr class="col-sm-5">

                    <td><h5>NIM : </h5></td>
                    <td><h5><?= $row['nim'] ?></h5></td>
                    <td><h5>Batas SKS : </h5></td>
                    <td><h5><?= $row['batas_sks'] ?></h5></td>
                </tr>

                <tr class="col-sm-7">
                    <td><h5>Nama Mahasiswa : </h5></td>
                    <td><h5><?= $row['nama_mahasiswa'] ?></h5></td>
                    <td><h5>Semester : </h5></td>
                    <td><h5><?= $row['semester'] ?></h5></td>
                </tr>      
            </tbody>
        </table>
    </div>
</div>

<?php 
    $id_krs_hdr = $row['id_krs_hdr'];
    include 'page/krs_hdr/krs_dtl/index.php';
?>