<div class="card-header row justify-content-end" style="padding-top: 10px;">
    <form method="post">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Pilih Semester</label>
            <div class="col-sm-5">
                <select class="form-control" id="basic-default-name" name="semester">
                    <?php 
                        $i = 1;
                        while ($i <= 14) {
                    ?>
                    <option value="<?= $i?>"><?= $i?></option>
                    <?php
                        $i++;
                        }
                    ?>
                </select>
            </div>
            <button type="submit" value="Submit" class="btn btn-primary col-sm-1" style="padding: 0px;">
                <span class="material-symbols-outlined">search</span>
            </button>
        </div>
    </form>
    <?php 
        if (isset($_POST['semester'])) {
            $semester = $_POST['semester'];
        } else {
            $semester = 1;
        }
            $result = $mysqli->query("SELECT * FROM krs_jadwal_mhs_view WHERE semester=$semester AND nim = $username;");
            $qry = $mysqli->query("SELECT * FROM krs_mahasiswa_view WHERE semester=$semester AND nim = $username;");
            $header = $qry->fetch_assoc();
            if (isset($header['status_validasi'])){
                if($header['status_validasi'] == 1){
                    $status = "Sudah divalidasi";
                } else {
                    $status = "Belum divalidasi";
                }
            } 
            ?>
            <div class="card">
                <div class="card-header row">
                    <?php if (isset($header['nim']) and isset($header['batas_sks']) and isset($header['nama_mahasiswa']) and isset($header['semester']) and isset($header['status_validasi'])) {?>
                    <h5 class="row"><center><b>KARTU RENCANA STUDI</center></b></h5>
                    <table >
                        <tbody>
                            <tr class="col-sm-5">
                                <td><h5>NIM : </h5></td>
                                <td><h5><?= $header['nim'] ?></h5></td>
                                <td><h5>Batas SKS : </h5></td>
                                <td><h5><?= $header['batas_sks'] ?></h5></td>
                            </tr>

                            <tr class="col-sm-7">
                                <td><h5>Nama Mahasiswa : </h5></td>
                                <td><h5><?= $header['nama_mahasiswa'] ?></h5></td>
                                <td><h5>Semester : </h5></td>
                                <td><h5><?= $header['semester'] ?></h5></td>
                            </tr>

                            <tr class="col-sm-7">
                                <td><h5>Status Validasi : </h5></td>
                                <td><h5><?= $status?></h5></td>
                            </tr>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>        
                        <th>Kode Ruang</th>
                        <th>Hari</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>             
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php 
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td> <?= $i?></td>
                        <td> <?=$row['kode_ruang'] ?></td>
                        <td> <?=$row['hari'] ?></td>
                        <td> <?=$row['jam_mulai'] ?></td>
                        <td> <?=$row['jam_selesai'] ?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <?php } else {?>
            <div class="card-header row justify-content-between">
                <h4 class="col"><center>SEMESTER BELUM TIBA!</center></h4>
            </div>
       <?php }
    ?>
    
