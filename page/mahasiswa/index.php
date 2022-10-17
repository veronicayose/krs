<?php 
    $result = $mysqli->query("SELECT * FROM mahasiswa a JOIN dosen b ON a.nid_dosen = b.nid_dosen");
?>
<div class="card">
    <div class="card-header row justify-content-between">
        <h5 class="col">Daftar Mahasiswa</h5>
        <div class="col-lg-2 col-md-3 col-sm-4 row justify-content-end">
            <a href="/<?= $folder ?>/mahasiswa/new">
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
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Tahun Kurikulum</th>
                    <th>Dosen PA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php 
                    while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama_mahasiswa'] ?></td>
                    <td><?= $row['tahun_kurikulum'] ?></td>
                    <td><?= $row['nama_dosen'] ?></td>
                    
                    <td>
                        <a href="/<?= $folder ?>/mahasiswa/edit?nim_mhs=<?= $row['nim'] ?>">
                            <button type="button" class="btn btn-icon btn-outline-primary">
                                <span class="tf-icons bx bx-edit-alt"></span>
                            </button>
                        </a>
                        <?php 
                        form_delete_start('delete-'.$row['nim'], "/$folder/mahasiswa/delete", 'post');
                        ?>
                            <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
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