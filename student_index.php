<?php
error_reporting();
ob_start();

include_once 'lib/config.php';
include_once 'lib/main.php';


$content = isset($_GET['content']) ? $_GET['content'] : 'home';
session_start();
$username = $_SESSION['username'];

$sql = $mysqli->query("SELECT * FROM mahasiswa WHERE nim = '$username'");

$r = $sql->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'layouts/links.php'; ?>
    <?php include 'layouts/scripts.php'; ?>
</head>
<body>
<?php include 'layouts/student_start.php';?>

<?php    if (file_exists("student_page/$content.php")) {
    include "student_page/$content.php";
} else if (file_exists("student_page/$content/index.php")) {
    include "student_page/$content/index.php";
} else {
    include 'student_page/not-found.php';
}

include 'layouts/end.php';?>
</body>
</html>