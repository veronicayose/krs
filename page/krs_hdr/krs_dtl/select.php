<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    for($i = 0; $i<$length; $i++){
        $statement = $mysqli->prepare("INSERT INTO krs_dtl (no_jadwal_detail, id_krs_hdr) VALUES (?, ?)");
        $statement->bind_param('ss', $_POST['no_jadwal_detail'], $_POST['id_krs_hdr']);
        $statement->execute();
        $statement->close();
        redirect("krs_hdr/detail?id_krs_hdr=".$_GET['id_krs_hdr']);
        exit;
    }
}
else {
    $result = $mysqli->query("SELECT * FROM jadwal_hdr a JOIN jadwal_dtl b ON a.no_jadwal_hdr=b.no_jadwal_hdr JOIN kelas c ON  c.kode_kelas = b.kode_kelas JOIN dosen d ON c.nid_dosen = d.nid_dosen JOIN matkul e ON e.kode_matkul = c.kode_matkul");
    $length = count($result);
?>
    <div class="table-responsive text-nowrap">
    <form method="post">
        <label for="basic-default-name">ID KRS Header</label>
        <div>
            <input value="<?= $_GET['id_krs_hdr']?>" type="number" class="form-control" id="basic-default-name" placeholder="ID KRS Header" name="id_krs_hdr" disabled>
        </div>
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
                        <input value="<?= $row['no_jadwal_detail']?>" type="checkbox" class="form-control form-check-input" name="no_jadwal_detail">
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
            <div class="row justify-content-start">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
?>