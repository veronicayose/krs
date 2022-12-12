<div class="card mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Restore File</h5>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama File</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="Nama file yang ingin direstore" name="restore">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Tabel Baru</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="basic-default-company" placeholder="Nama baru untuk tabel yang akan direstore ke database" name="nama_tabel">
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <?php if (isset($_POST['nama_tabel']) and isset($_POST['restore'])) {
            $ver = restoreFile($_POST['restore'], $_POST['nama_tabel']);
            if(!$ver)
            {
                echo mysqli_error($mysqli);
                die();
            }
            else
            {
                echo "Tabel sudah di restore";
            } 
        }?>
    </div>
</div>