<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("DELETE FROM krs_hdr WHERE id_krs_hdr=?");
    $statement->bind_param('s', $_POST['id_krs_hdr']);
    $statement->execute();
    $statement->close();
    redirect("krs_hdr");
    exit;
}
?>