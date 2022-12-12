<?php 
    $result = $mysqli->query("SELECT * FROM krs_jadwal_view WHERE id_krs_hdr=$id_krs_hdr;" );
?>
    <div class="card-header row justify-content-end">
        <div class="col-lg-2 col-md-3 col-sm-4">
            <!--a href="/<?= $folder ?>/krs_hdr/krs_dtl/new?id_krs_hdr=< ?= //$id_krs_hdr ?>">
                <button type="button" class="btn btn-primary">
                    <span> Tambah</span>
                </button>
            a>-->
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Semester</th>             
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
                    <td><?= $i?></td>
                    <td> <?=$row['semester'] ?></td>
                    <td> <?=$row['kode_ruang'] ?></td>
                    <td> <?=$row['hari'] ?></td>
                    <td> <?=$row['jam_mulai'] ?></td>
                    <td> <?=$row['jam_selesai'] ?></td>
                    
                    <td>
                        <?php 
                        form_delete_start('delete-'.$row['id_krs_dtl'], "/$folder/krs_hdr/krs_dtl/delete", 'post');
                        ?>
                            <input type="hidden" name="id_krs_dtl" value="<?= $row['id_krs_dtl'] ?>">
                        <?php 
                        form_delete_end();
                        ?>
                    </td>
                </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>