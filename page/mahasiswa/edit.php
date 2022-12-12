<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("UPDATE mahasiswa SET nama_mahasiswa=?, tahun_kurikulum=?, nid_dosen=? WHERE nim=?");
    $statement->bind_param('ssss', $_POST['nama_mahasiswa'], $_POST['tahun_kurikulum'], $_POST['nid_dosen'], $_GET['nim_mhs']);
    $statement->execute();
    $statement->close();
    redirect('mahasiswa');
    exit;
}
else {
    $dosenResult = $mysqli->query("SELECT * FROM dosen");
    $kurikulumResult = $mysqli->query("SELECT * FROM kurikulum");
    $result = $mysqli->query("SELECT * FROM mahasiswa WHERE nim=".$_GET['nim_mhs']);
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
                <label class="col-sm-2 col-form-label" for="basic-default-name">NIM</label>
                <div class="col-sm-10">
                    <input value="<?= $row['nim'] ?>" type="text" class="form-control" name="nim" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama</label>
                <div class="col-sm-10">
                    <input value="<?= $row['nama_mahasiswa'] ?>" type="text" class="form-control" placeholder="Nama Mahasiswa" name="nama_mahasiswa">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Tahun Kurikulum</label>
                <div class="col-sm-10">
                <input class="form-control" list="kurikulum" placeholder="Cari..." name="kode_kurikulum">
                    <datalist id="kurikulum">
                        <?php 
                            while ($row1 = $kurikulumResult->fetch_assoc()) {
                        ?>
                        <option value="<?= $row1['kode_kurikulum'] ?>"><?= $row1['tahun_berlaku']?></option>
                        <?php
                            }
                        ?>
                    </datalist>
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
<?php } ?>