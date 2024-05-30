!<?php 
// session_start();

// if( !isset($_SESSION["login"]) ) {
//     header("Location: login.php");
//     exit;
// }

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
</head>
<body>

<a href="logout.php">Logout</a>
    
<h1>Daftar wisata</h1>

<a href="tambah.php">Tambah data wisata</a>
<br><br>

<form action="" method="post">

    <input type="text" name="keyword" size="40" autofocus="" placeholder="masukan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari">Cari!</button>

</form>

<table border="1" cellpading="10" cellspacing="0">

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
            <a href="hapus.php?id=<?= $row["id"]; ?>"  onclick="return confirm('yakin?');">hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

</table>

</body>
</html>