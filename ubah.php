<?php
session_start();

require 'functions.php'; // Memuat file fungsi

// Memeriksa status login
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// Memeriksa peran pengguna
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Mengambil data dari URL
$id = $_GET["id"];

// Mengambil data wisata berdasarkan id
$wst = query("SELECT * FROM wisata WHERE id = $id")[0];

// Memproses form jika sudah disubmit
if (isset($_POST["submit"])) {
    // Melakukan validasi atau pemrosesan data
    // Panggil fungsi ubah() untuk mengubah data
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'wisata.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'wisata.php';
              </script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ubah data wisata</title>
    <link rel="stylesheet" href="css/ubah.css">
    <style>
    /* CSS styling */
    </style>
</head>

<body>

    <button class="kembali">
        <a href="wisata.php">Kembali</a>
    </button>

    <div class="login-box">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $wst["id"] ?>">
            <input type="hidden" name="gambarLama" value="<?= $wst["gambar"] ?>">
            <div class="user-box">
                <input type="text" name="judul" id="judul" required value="<?= $wst["judul"] ?>">
                <label for="judul">Judul : </label>
            </div>

            <div class="user-box">
                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $wst["deskripsi"] ?>">
                <label for="deskripsi">Deskripsi: </label>
            </div>

            <div class="gambar-custom">
                <input type="file" name="gambar" id="gambar">
                <img src="img/<?= $wst['gambar']; ?>" width="40" alt=""> <br>
            </div>

            <center>
                <button type="submit" name="submit">Ubah Data<span></span></button>
            </center>
        </form>
    </div>

</body>

</html>