<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("DELETE FROM krs_dtl WHERE id_krs_dtl=?");
    $statement->bind_param('s', $_POST['id_krs_dtl']);
    $statement->execute();
    $statement->close();
    redirect("krs_hdr");
    exit;
}
?>