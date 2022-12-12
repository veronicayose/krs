<?php
error_reporting();
ob_start();

include_once 'lib/config.php';
include_once 'lib/main.php';

$content = isset($_GET['content']) ? $_GET['content'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="back">
    <div class="login">
        <h2><b>LOG IN</b></h2>
        <form action="login_process.php" method="POST" enctype="multipart/form-data">
            <label><b>Username</b></label><br>
            <input type="text" name="username"><br><br>

            <label><b>Password</b></label><br>
            <input type="password" name="password"><br><br>
            <input type="submit" class="button" name="submit" value="Log in">
        </form>
    </div>
</div>
</body>
</html>