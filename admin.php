!<?php 
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
$wisata = query("SELECT * FROM wisata");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $wisata = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <a href="logout.php">Logout</a>

    <h1>Daftar wisata</h1>

    <a href="tambah.php">Tambah data wisata</a>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size="40" autofocus="" placeholder="masukan keyword pencarian"
            autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>

    <table class="table ">

        <tr>
            <th>no.</th>
            <th>gambar</th>
            <th>judul</th>
            <th>deskripsi</th>
            <th>aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $wisata as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <img src="assets/img/<?= $row["gambar"]; ?>" width="75" alt="">
            </td>
            <td><?= $row["judul"]  ?></td>
            <td><?= $row["deskripsi"]  ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>