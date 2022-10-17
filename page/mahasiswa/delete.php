<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statement = $mysqli->prepare("DELETE FROM mahasiswa WHERE nim=?");
    $statement->bind_param('s', $_POST['nim']);
    $statement->execute();
    $statement->close();
    redirect("mahasiswa");
    exit;
}
?>