<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

//query data wisata berdasarkan id
$wst = query("SELECT * FROM wisata WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'admin.php';
            </script>
            ";
    } else {
        echo "
        <script>
            alert('data gagal diubah!');
            document.location.href = 'admin.php';
            </script>
            ";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ubah data wisata</title>
</head>
<body>
    <h1>Ubah data wisata</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $wst["id"] ?>">
        <input type="hidden" name="gambarLama" value="<?= $wst["gambar"] ?>">
        <ul>
            <li>
                <label for="judul">Judul : </label>
                <input type="text" name="judul" id="judul" requied value="<?= $wst["judul"] ?>">
            </li>
            <li>
                <label for="deskripsi">Deskripsi: </label>
                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $wst["deskripsi"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar: </label> <br>
                <img src="img/<?= $wst['gambar']; ?>" width="40" alt=""> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>