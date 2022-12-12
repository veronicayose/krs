
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("INSERT INTO krs_dtl (no_jadwal_hdr, id_krs_hdr) VALUES (?, ?)");
    $statement->bind_param('ss', $_POST['no_jadwal_hdr'], $_POST['id_krs_hdr']);
    $statement->execute();
    $statement->close();
    redirect("krs_hdr/detail?id_krs_hdr=$id_krs_hdr");
    exit;
}
else {
    $dosenResult = $mysqli->query("SELECT * FROM jadwal_prodi_view");
?>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah KRS Details</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">ID KRS Header</label>
                <div class="col-sm-10">
                    <input value="<?= $_GET['id_krs_hdr']?>" type="number" class="form-control" id="basic-default-name" placeholder="ID KRS Header" name="id_krs_hdr" disabled>
                </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Jadwal Header</label>
                <div class="col-sm-10">
                    <input class="form-control" list="jadwal" placeholder="Cari..." name="no_jadwal_hdr">
                    <datalist id="jadwal">
                        <?php 
                            while ($row = $dosenResult->fetch_assoc()) {
                        ?>
                        <option value="<?= $row['no_jadwal_hdr'] ?>"><?= 'Prodi '.$row['nama_prodi'].'; Semester '.$row['semester'].'; Tahun Akademik '.$row['tahun_akademik'].'; Tahun Kurikulum '.$row['tahun_kurikulum']?></option>
                        <?php
                            }
                        ?>
                    </datalist>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
?>