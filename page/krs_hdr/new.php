<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("INSERT INTO krs_hdr (semester, batas_sks, nim) VALUES (?, ?, ?)");
    $statement->bind_param('sss', $_POST['semester'], $_POST['batas_sks'], $_POST['nim']);
    $statement->execute();
    $statement->close();
    redirect("krs_hdr");
    exit;
}
else {
    $mhsResult = $mysqli->query("SELECT * FROM mahasiswa");
?>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah KRS Header</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Semester</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="basic-default-company" placeholder="Semester" name="semester">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Batas SKS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="basic-default-name" placeholder="Batas SKS" name="batas_sks">
                </div>
            </div>
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Mahasiswa</label>
                <div class="col-sm-10">
                    <input class="form-control" list="mhs" placeholder="Cari..." name="nim">
                    <datalist id="mhs">
                        <?php 
                            while ($row = $mhsResult->fetch_assoc()) {
                        ?>
                        <option value="<?= $row['nim'] ?>"><?= $row['nama_mahasiswa']?></option>
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
<?php }?>