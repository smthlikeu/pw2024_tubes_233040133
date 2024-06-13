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
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'admin.php';
            </script>
            ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'admin.php';
            </script>
            ";
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>
<link rel="stylesheet" href="css/tambah.css">

<body>

    <!-- <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="judul">Judul: </label>
                <input type="text" name="judul" id="judul" requied>
            </li>
            <li>
                <label for="deskripsi">Deskripsi: </label>
                <input type="text" name="deskripsi" id="deskripsi" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form> -->

    <div class="login-box">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="user-box">
                <input type="text" name="judul" id="judul" required>
                <label for="judul">Judul: </label>
            </div>

            <div class="user-box">
                <input type="text" name="deskripsi" id="deskripsi" required>
                <label for="deskripsi">Deskripsi: </label>
            </div>

            <div class="gambar-custom">
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar" required>
            </div>

            <center>
                <button type="submit" name="submit">Tambah Data<span></span></button>
            </center>
        </form>
    </div>





</body>

</html>