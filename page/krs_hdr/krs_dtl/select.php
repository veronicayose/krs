
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("INSERT INTO krs_dtl (no_jadwal_detail, id_krs_hdr) VALUES (?, ?)");
    $statement->bind_param('ss', $_POST['no_jadwal_detail'], $_POST['id_krs_hdr']);
    $statement->execute();
    $statement->close();
    redirect("krs_hdr/detail?id_krs_hdr=".$_GET['id_krs_hdr']);
    exit;
}
else {
    $result = $mysqli->query("SELECT * FROM jadwal_hdr a JOIN jadwal_dtl b ON a.no_jadwal_hdr=b.no_jadwal_hdr JOIN kelas c ON  c.kode_kelas = b.kode_kelas JOIN dosen d ON c.nid_dosen = d.nid_dosen JOIN matkul e ON e.kode_matkul = c.kode_matkul");
?>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah KRS Details</h5>
    </div>
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
                <?php }
                ?>

            </tbody>
        </table>



        
    </div>
</div>
<?php }
?>