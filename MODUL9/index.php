<?php
require "functions.php";
$dosen = query("SELECT * FROM dosen ORDER BY id ASC");

if(isset($_POST['cari'])){
    $dosen = cari($_POST['keynama'], $_POST['keyprodi'], $_POST['nidnawal'], $_POST['nidnakhir']);
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
<h1>Daftar Dosen</h1>
<a href="tambah.php">Tambah Data Dosen</a><br><br>

<form action="" method="post">
    <input type="text" name="keynama" size="30" placeholder="Masukan Nama" autocomplete="off">
    <input type="text" name="nidnawal" size="30" placeholder="Masukan NIDN Awal" autocomplete="off">
    <input type="text" name="nidnakhir" size="30" placeholder="Masukan NIDN Akhir" autocomplete="off">
    <!-- <input type="text" name="keyprodi" size="30" placeholder="Masukan Prodi" autocomplete="off"> -->
    
    <select name="keyprodi">
        <option value="">-----Pilih Prodi-----</option>
        <option value="Kedokteran JavaScript">Kedokteran JavaScript</option>
        <option value="Sastra Lifting">Sastra Lifting</option>
        <option value="Teknik Estetik">Teknik Estetik</option>
        <option value="Ilmu Low Reps">Ilmu Low Reps</option>
        <option value="Farmasi C++">Farmasi C++</option>
    </select>
    <button type="submit" name="cari">CARI</button><br><br>
</form>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Email</th>
            <th>Prodi</th>
            <!-- <th>Nama Foto</th> -->
        </tr>
        <?php $i = 1;?>
        <?php foreach($dosen as $row):?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
                <a href="ubah.php?id=<?=$row["id"];?>">Ubah</a>
                <a href="hapus.php?id=<?=$row["id"];?>"
                onclick="return confirm('Anda ingin menghapus data ini?');" >Hapus</a>
            </td>
            <td><img src="img/<?=$row['foto']?>" width="100" alt=""></td>
            <td><?=$row['nama']?></td>
            <td><?=$row['nidn']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['prodi']?></td>
            <!-- <td><?=$row['foto'] ?></td> -->
        </tr>
        <?php $i++?>
        <?php endforeach; ?>
    </table>
</body>
</html>