<?php 
    $result = $mysqli->query("SELECT * FROM krs_mahasiswa_view");
?>
<div class="card">
    <div class="card-header row justify-content-between">
        <h5 class="col">Daftar KRS</h5>
        <div class="col-lg-2 col-md-3 col-sm-4 row justify-content-end">
            <a href="/<?= $folder ?>/krs_hdr/new">
                <button type="button" class="btn btn-primary">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah
                </button>
            </a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Batas SKS</th>
                    <th>Status Validasi</th>
                    <th>Mahasiswa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php 
                    while ($row = $result->fetch_assoc()) {
                        $ket = "";
                ?>
                <tr>
                    <td><?= $row['semester'] ?></td>
                    <td><?= $row['batas_sks'] ?></td>
                    <td><?= $row['status_validasi'] == 0 ? "Belum tervalidasi" : "Tervalidasi"?></td>
                    <td><?= $row['nama_mahasiswa'] ?></td>
                    
                    <td>
                        <a href="/<?= $folder ?>/krs_hdr/detail?id_krs_hdr=<?= $row['id_krs_hdr'] ?>">
                            <button type="button" class="btn btn-icon btn-outline-primary">
                                <span class="tf-icons bx bx-show"></span>
                            </button>
                        </a>
                        <a href="/<?= $folder ?>/krs_hdr/edit?id_krs_hdr=<?= $row['id_krs_hdr'] ?>">
                            <button type="button" class="btn btn-icon btn-outline-primary">
                                <span class="tf-icons bx bx-edit-alt"></span>
                            </button>
                        </a>
                        <?php 
                        form_delete_start('delete-'.$row['id_krs_hdr'], "/$folder/krd_hdr/delete", 'post');
                        ?>
                            <input type="hidden" name="id_krs_hdr" value="<?= $row['id_krs_hdr'] ?>">
                        <?php 
                        form_delete_end();
                        ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>