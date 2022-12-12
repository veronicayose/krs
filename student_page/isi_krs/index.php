<?php 
    $qry = $mysqli->query("SELECT * FROM krs_hdr WHERE id_krs_hdr =".$_GET['id_krs_hdr']);
    $result = $qry->fetch_assoc();
    if ($result['status_validasi'] == 1){ ?>
        <div class="card">
            <div class="card-header row justify-content-between">
                <h4 class="col"><center>PENGISIAN KARTU RENCANA STUDI TIDAK TERSEDIA</center></h4>
            </div>
        </div>
    <?php } else {
        $qry = $mysqli->query("SELECT * FROM krs_mahasiswa_view WHERE semester=$semester AND nim = $username;");
        $header = $qry->fetch_assoc();
        ?>
        <div class="card" style="padding: 10px;">
            <div class="card-header row">
                <h5 class="row"><center><b>PENGISIAN KARTU RENCANA STUDI</center></b></h5>
                <table >
                    <tbody>
                        <tr class="col-sm-5">
                            <td><h5>NIM : </h5></td>
                            <td><h5><?= $header['nim'] ?></h5></td>
                            <td><h5>Batas SKS : </h5></td>
                            <td><h5><?= $header['batas_sks'] ?></h5></td>
                        </tr>

                        <tr class="col-sm-7">
                            <td><h5>Nama Mahasiswa : </h5></td>
                            <td><h5><?= $header['nama_mahasiswa'] ?></h5></td>
                            <td><h5>Semester : </h5></td>
                            <td><h5><?= $header['semester'] ?></h5></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php }
    $id_krs_hdr = $header['id_krs_hdr'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $statement = $mysqli->prepare("INSERT INTO krs_dtl (no_jadwal_detail, id_krs_hdr) VALUES (?, ?)");
        $statement->bind_param('ss', $_POST['no_jadwal_detail'], $_POST['id_krs_hdr']);
        $statement->execute();
        $statement->close();
        exit;
    }
    else {
        $result = $mysqli->query("SELECT * FROM jadwal_full_view");
    ?>
    <div class="card mb-4" style="margin-top: 20px;">
        <div class="card-body">
        <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Semester</th>             
                        <th>Kode Ruang</th>
                        <th>Dosen</th>
                        <th>Mata Kuliah</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>             
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php 
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                        <form method="post">
                            <input value="<?= $_GET['id_krs_hdr']?>" class="col-sm-2" name="id_krs_hdr" type="hidden"></input>
                            <input value="<?= $row['no_jadwal_detail']?>" class="col-sm-2" name="no_jadwal_detail" type="hidden"></input>
                        <button type="submit" class="btn btn-primary">Select</button>
                        </form>
                    </td>
                    <td> <?=$row['semester'] ?></td>
                    <td> <?=$row['kode_ruang'] ?></td>
                    <td> <?=$row['nama_dosen'] ?></td>
                    <td> <?=$row['nama_matkul'] ?></td>
                    <td> <?=$row['hari'] ?></td>
                    <td> <?=$row['jam_mulai'] ?></td>
                    <td> <?=$row['jam_selesai'] ?></td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    }?>