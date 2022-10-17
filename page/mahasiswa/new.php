<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("INSERT INTO mahasiswa (nim, nama_mahasiswa, tahun_kurikulum, nid_dosen) VALUES (?, ?, ?, ?)");
    $statement->bind_param('ssss', $_POST['nim'], $_POST['nama_mahasiswa'], $_POST['tahun_kurikulum'], $_POST['nid_dosen']);
    $statement->execute();
    $statement->close();
    redirect("mahasiswa");
    exit;
}
else {
    $dosenResult = $mysqli->query("SELECT * FROM dosen");
?>
<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Tambah Mahasiswa</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="Nomor Induk Mahasiswa" name="nim">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-company" placeholder="Nama" name="nama_mahasiswa">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Tahun Kurikulum</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-company" placeholder="Tahun Kurikulum" name="tahun_kurikulum">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">NID PA</label>
                <div class="col-sm-10">
                    <input class="form-control" list="dosen-pa" placeholder="Cari..." name="nid_dosen">
                    <datalist id="dosen-pa">
                        <?php 
                            while ($row = $dosenResult->fetch_assoc()) {
                        ?>
                        <option value="<?= $row['nid_dosen'] ?>"><?= $row['nama_dosen']?></option>
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