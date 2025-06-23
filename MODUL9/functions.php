<?php

$conn = mysqli_connect('localhost', 'root', '', 'latihandb');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    $result = mysqli_query($conn, "SELECT username from registrasi where username = '$username'");

    if(mysqli_fetch_array($result)){
        echo "
        <script>
        alert('Username sudah terdaftar')
        </script>";
        return false;
    }

    if($password !== $password2){
        echo "
        <script>
        alert('Password tidak sesuai!')
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO registrasi (username, password) values ('$username', '$password')");

    return mysqli_affected_rows($conn);

}

function cari($keynama, $keyprodi, $nidnawal, $nidnakhir)
{
    $cari = "SELECT * FROM dosen ";
    if (!empty($keynama) && !empty($keyprodi) && !empty($nidnawal) || !empty($nidnakhir)) {
        $cari .= "WHERE nama LIKE '%$keynama%' AND prodi LIKE '%$$keyprodi%' AND nidn LIKE '$nidnawal%' OR nidn LIKE '%$nidnakhir'";
    } else if (!empty($keynama) && !empty($keyprodi)) {
        $cari .= "WHERE nama LIKE '%$keynama%' AND prodi LIKE '%$$keyprodi%'";
    } else if (!empty($keynama)) {
        $cari .= "WHERE nama LIKE '%$keynama%'";
    } else if (!empty($nidnawal)) {
        $cari .= "WHERE nidn LIKE '$nidnawal%'";
    } else if (!empty($nidnakhir)) {
        $cari .= "WHERE nidn LIKE '%$nidnakhir'";
    } else if (!empty($keyprodi)) {
        $cari .= "WHERE prodi LIKE '%$keyprodi%'";
    }
    return query($cari);
    // $query = "SELECT * FROM dosen WHERE nama LIKE '%$keyword%' OR prodi LIKE '%$keyword%' OR nidn LIKE '%$keyword%'";
    // return query($query);
}

function upload()
{
    $filename = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
        alert('Upload Gambar terlebih dahulu!')
        </script>";
        var_dump($error);
        return false;
    }

    $fileExtensionValid = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $filename);
    $fileExtension = strtolower(end($fileExtension));

    if (!in_array($fileExtension, $fileExtensionValid)) {
        echo "
        <script>alert('Yang anda upload bukan Gambar!')</script>";
        var_dump($fileExtension);
        return false;
    }

    if ($filesize > 1000000) {
        echo "
        <script>alert('Ukuran gambar terlalu Besar!')</script>";
        // var_dump($fileSize);
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $fileExtension;
    // echo "<br>Ini Var Dump nya di bawah<br>";
    // var_dump($newFileName);
    // die;

    move_uploaded_file($tmpName, 'img/' . $newFileName);
    return $newFileName;
}

function ubahfoto()
{ {
        $filename = $_FILES['foto']['name'];
        $filesize = $_FILES['foto']['size'];
        $tmpName = $_FILES['foto']['tmp_name'];

        $fileExtensionValid = ['jpg', 'jpeg', 'png'];
        $fileExtension = explode('.', $filename);
        $fileExtension = strtolower(end($fileExtension));

        if (!in_array($fileExtension, $fileExtensionValid)) {
            echo "
        <script>alert('Yang anda upload bukan Gambar!')</script>";
            var_dump($fileExtension);
            return false;
        }

        if ($filesize > 1000000) {
            echo "
        <script>alert('Ukuran gambar terlalu Besar!')</script>";
            // var_dump($fileSize);
            return false;
        }

        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $fileExtension;
        // echo "<br>Ini Var Dump nya di bawah<br>";
        // var_dump($newFileName);
        // die;

        move_uploaded_file($tmpName, 'img/' . $newFileName);
        return $newFileName;
    }
}

function tambah($data)
{
    global $conn;
    $nama = $data['nama'];
    $email = $data['email'];
    $nidn = $data['nidn'];
    $prodi = $data['prodi'];

    $foto = upload();

    if (!$foto) {
        return false;
        echo "Upload Gagal";
    }

    $query = "INSERT INTO dosen (nama, nidn, email, prodi, foto) VALUES ('$nama','$nidn','$email','$prodi','$foto')";
    mysqli_query($conn, $query);

    if (mysqli_error($conn)) {
        echo "MySQL Error: " . mysqli_error($conn);
    }

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM dosen WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function hapus_file()
{
    $filename = $_FILES['foto']['name'];
    $filesize = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
        alert('Upload Gambar terlebih dahulu!')
        </script>";
        var_dump($error);
        return false;
    }

    $fileExtensionValid = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $filename);
    $fileExtension = strtolower(end($fileExtension));

    $folder = "img";
    $path_file = $folder . "/" . $filename;
}

function ubah($data)
{
    global $conn;

    $id = $_GET['id'];
    $nama = $data['nama'];
    $email = $data['email'];
    $nidn = $data['nidn'];
    $prodi = $data['prodi'];

    $folder = "img";
    $fileName = $data['foto_lama'];
    $pathFile = $folder . "/" . $fileName;

    if ($_FILES['foto']['error'] === 4) {
        $foto = $data['foto_lama'];
    } else {
        $foto = ubahfoto();
        if (file_exists($pathFile)) {
            if (unlink($pathFile)) {
                echo "
                    <script>
                    alert('Foto Lama [ $fileName ] telah di Ganti')
                    </script>";
            } else {
                echo "
                    <script>
                    alert('Foto Lama [ $fileName ] gagal di Ganti')
                    </script>";
            }
        } else {
            echo "
                <script>
                alert('Foto [ $fileName ] tidak di Temukan')
                </script>";
        }
        if (!$foto) {
            $foto = $data['foto_lama'];
        }
    }


    // $hapus = "UPDATE dosen SET foto = null WHERE id = $id";
    $query = "UPDATE dosen SET 
    nama='$nama', 
    nidn='$nidn', 
    email='$email', 
    prodi='$prodi', 
    foto='$foto' 
    WHERE id=$id";

    mysqli_query($conn, $query);


    if (mysqli_error($conn)) {
        echo "MySQL Error: " . mysqli_error($conn);
    }

    return mysqli_affected_rows($conn);
}
