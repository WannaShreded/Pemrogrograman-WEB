<?php
require 'functions.php';
$id = $_GET['id'];

$dsn = query("SELECT * FROM dosen WHERE id = $id")[0];
echo "[ ". $dsn['nama']." ]";

if(isset($_POST['submit'])){
    if(ubah($_POST) > 0){
        echo "<script>
        alert('Data berhasil di ubah');
        document.location.href = 'index.php';
        </script>";
    }
    else{
        echo "<script>
        alert('Data gagal di ubah');
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
    <h1>Ubah Data Dosen</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
        <li>
            <label for="nidn"> NIDN: </label>
            <input type="text" name="nidn" id="nidn" size="30" required value="<?= $dsn['nidn'];?>">
        </li>
        <li>
            <label for="nama"> NAMA: </label>
            <input type="text" name="nama" id="nama" size="30" required value="<?= $dsn['nama'];?>">
        </li>
        <li>
            <label for="email"> EMAIL: </label>
            <input type="email" name="email" id="email" size="30" required value="<?= $dsn['email'];?>">
        </li>
        <li>
            <label for="prodi"> PRODI: </label>
            <input type="text" name="prodi" id="prodi" size="30" required value="<?= $dsn['prodi'];?>">
        </li>
        <li>
            <label for="foto"> FOTO: </label><br>
            <img src="img/<?=$dsn['foto']?>" width="100" alt=""><br>
            <input type="file" name="foto" id="foto" value= "<?=$dsn['foto'];?>"><br>
        </li>
        <li>
            <label for="foto_lama"> Foto Lama: </label>
            <input type="text" name="foto_lama" id="foto_lama" value="<?=$dsn['foto']?>">
        </li>
        <li>
            <button type="submit" name="submit"> UBAH </button>
        </li>
    </ul>
    </form>
    <a href="index.php"><button>Kembali</button></a>
</body>

</html>