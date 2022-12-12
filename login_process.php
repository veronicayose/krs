<?php
    include './lib/config.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'"; //query
    $login = mysqli_query($mysqli, $sql);
    $r = $login->fetch_assoc();;
    echo $r['role'];

    if($_GET['username'] = $username AND $_GET['pass'] = $password){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['pass'] = $password;
        $_SESSION['status'] = "login";
        if ($r['role'] == 1){ 
            header("location:admin_index.php");
        } elseif ($r['role'] == 2) {
            header("location:student_index.php");
        }
    } else{
        header("location:login.php");
    }
?>