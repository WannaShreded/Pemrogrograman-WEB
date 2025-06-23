<?php
require 'functions.php';
if(isset($_POST['register'])){
    if(registrasi($_POST) > 0){
        echo "
        <script>
        alert('User Berhasil Daftarkan');
        document.location.href = 'index.php';
        </script>";
    }else{
        echo "Gagal Daftar [ ".mysqli_error($conn)." ]";
    }
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
            <label for="password2"> KONFIRMASI PASSWORD: </label>
            <input type="password" name="password2" id="password2" required>
        </li>
        <li>
            <button type="submit" name="register"> REGISTER </button>
        </li>
        </ul>
    </form>
    <p>Ingin melanjutkan Login?</p>
    <a href="login.php"><button>LOGIN</button></a>

</body>
</html>