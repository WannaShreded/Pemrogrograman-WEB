<?php

use Dom\Mysql;

require 'functions.php';
session_start();


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM registrasi where username = '$username'");

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);

        if(password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HALAMAN LOGIN</h1>
    <?php if(isset($error)):?>
        <p style="color: red;">Login Gagal [Password] atau [Username] Salah</p>
        <?php endif?>
    <form action="" method="post">
        <ul>
            <li>
            <label for="username"> NAMA: </label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password"> PASSWORD: </label>
            <input type="password" name="password" id="username" required>
        </li>
        <li>
            <button type="submit" name="login"> LOGIN </button>
        </li>
        </ul>
    </form>
    <p>Belum Memiliki Akun?</p>
    <a href="registrasi.php"><button>REGISTER</button></a>    

</body>
</html>