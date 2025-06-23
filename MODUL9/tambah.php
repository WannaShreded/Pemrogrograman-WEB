<?php
require "functions.php";
if(isset($_POST['submit'])){
    var_dump($_POST);
    var_dump($_FILES);

    if(tambah($_POST) > 0){
        echo "<script>
        alert('Data berhasil di input');
        document.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data gagal di input');
        document.location.href = 'index.php';
        </script>";
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
    <h1>Tambah Data Dosen</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
        <li>
            <label for="nidn"> NIDN: </label>
            <input type="text" name="nidn" id="nidn">
        </li>
        <li>
            <label for="nama"> NAMA: </label>
            <input type="text" name="nama" id="nama">
        </li>
        <li>
            <label for="email"> EMAIL: </label>
            <input type="email" name="email" id="email">
        </li>
        <li>
            <label for="prodi"> PRODI: </label>
            <input type="text" name="prodi" id="prodi">
        </li>
        <li>
            <label for="foto"> FOTO: </label>
            <input type="file" name="foto" id="foto">
        </li>
        <li>
            <button type="submit" name="submit"> TAMBAH </button>
        </li>
    </ul>
    </form>
    <a href="index.php"><button>Kembali</button></a>
</body>

</html>