<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Backup File</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Tabel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="Nama table yang ingin dibackup" name="nama_tabel">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Tabel Baru</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-company" placeholder="Nama baru untuk tabel yang sudah dibackup" name="backup">
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <?php if (isset($_POST['nama_tabel']) and isset($_POST['backup'])) {
            $ver = backupFile($_POST['backup'], $_POST['nama_tabel']);
            if(!$ver)
            {
                echo mysqli_error($mysqli);
                die();
            }
            else
            {
                echo "Tabel sudah di backup";
            } 
        }?>
    </div>
</div>