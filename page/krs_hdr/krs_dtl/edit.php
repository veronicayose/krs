<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("UPDATE krs_dtl SET id_krs_hdr=?, no_jadwal_hdr=? WHERE id_krs_dtl=?");
    $statement->bind_param('sss', $_GET['id_krs_hdr'], $_POST['no_jadwal_hdr'], $_GET['id_krs_detail']);
    $statement->execute();
    $statement->close();
    redirect('krs_dtl');
    exit;
}
else {
    $result = $mysqli->query("SELECT * FROM krs_dtl WHERE id_krs_dtl=".$_GET['id_krs_detail']);
    $row = $result->fetch_assoc();
    if (!$row) {
        redirect('not-found');
        return;
    }
?>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Basic Layout</h5>
        <small class="text-muted float-end">Default label</small>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">No jadwal_hdr</label>
                <div class="col-sm-10">
                    <input value="<?= $row['no_jadwal_hdr'] ?>" type="number" class="form-control" placeholder="No Jadwal Header" name="no_jadwal_hdr">
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