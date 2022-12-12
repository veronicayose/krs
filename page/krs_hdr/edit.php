<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("UPDATE krs_hdr SET semester=?, batas_sks=?, nim=?, status_validasi=? WHERE id_krs_hdr=?");
    $statement->bind_param('sssss', $_POST['semester'], $_POST['batas_sks'], $_POST['nim'], $_POST['status_validasi'], $_GET['id_krs_hdr']);
    $statement->execute();
    $statement->close();
    redirect('krs_hdr');
    exit;
}
else {
    $result = $mysqli->query("SELECT * FROM krs_mahasiswa_view WHERE id_krs_hdr=".$_GET['id_krs_hdr']);
    $row = $result->fetch_assoc();
    if (!$row) {
        redirect('not-found');
        return;
    }
?>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Edit KRS Header</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Mahasiswa</label>
                <div class="col-sm-10">
                    <input value="<?= $row['nama_mahasiswa'] ?>" type="text" class="form-control" placeholder="Nomor Induk Mahasiswa" name="nama_mahasiswa" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Semester</label>
                <div class="col-sm-10">
                    <input value="<?= $row['semester'] ?>" type="number" class="form-control" placeholder="Semester" name="semester">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Batas SKS</label>
                <div class="col-sm-10">
                    <input value="<?= $row['batas_sks'] ?>" type="number" class="form-control" placeholder="Batas SKS" name="batas_sks">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Status Validasi</label>
                <div class="col-sm-10">
                    <input value="1" type="checkbox" class="form-control form-check-input" name="status_validasi" <?php echo ($row['status_validasi'] == 1 ? 'checked' : '');?>>
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
<?php } ?>